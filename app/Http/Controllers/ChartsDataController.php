<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DateTime;
use DatePeriod;
use DateInterval;
use DB;

class ChartsDataController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Not Authenticated']);
        }

        if (!$request->has(['dimension', 'room', 'start', 'end'])) {
            return response()->json(['error' => 'Provide all params']);
        }

        $input = $request->all();
        $startDate = DateTime::createFromFormat('d/m/Y', $input['start']);
        $endDate = DateTime::createFromFormat('d/m/Y', $input['end']);
        $dateDiff = intval($startDate->diff($endDate)->format('%R%a'));

        if ($dateDiff < 0) {
            return response()->json(['error' => 'Invalid dates']);
        }

        $measurements = DB::table('measurement')
            ->select(DB::raw('description, DATE(time) AS date, ROUND(AVG(value), 2) as value'))
            ->join('physical_dimension', 'physical_dimension.physical_dimension_id', '=', 'measurement.physical_dimension_id')
            ->join('sensor', 'sensor.sensor_id', '=', 'physical_dimension.sensor_id')
            ->where([
                ['physical_dimension.name', '=', $input['dimension']],
                ['sensor.room_id', '=', $input['room']]])
            ->groupBy('description', 'date')
            ->get();

        $data = array_values($measurements->filter(function ($item) use ($startDate, $endDate) {
            return $this->check_date_range($startDate->format('Y-m-d'), $endDate->format('Y-m-d'), $item->date);
        })->all());

        if (count($data) == 0) {
            return response()->json(['error' => 'No data found for this period!']);
        }

        $labels = $this->get_labels($startDate, $endDate);

        $datasets = array();
        $desc = $data[0]->description;
        $n = 0;

        for ($i = 0; $i < count($data); ++$i) {
            if ($data[$i]->description != $desc) {
                $desc = $data[$i]->description;
                ++$n;
            }
            if (!isset($datasets[$n])) {
                array_push($datasets, array());
                $datasets[$n]['description'] = $data[$i]->description;
                $datasets[$n]['data'] = array();
            }

            array_push($datasets[$n]['data'], $data[$i]->value);
        }

        return response()->json(['labels' => $labels, 'measurements' => $datasets]);
    }

    private function get_labels($startDate, $endDate)
    {
        $labels = array();

        $period = new DatePeriod(
            $startDate,
            new DateInterval('P1D'),
            $endDate->add(new DateInterval('P1D'))
        );

        foreach ($period as $key => $value) {
            array_push($labels, $value->format('Y-m-d'));
        }

        return $labels;
    }

    private function check_date_range($start_date, $end_date, $input_date)
    {
        $start_ts = strtotime($start_date);
        $end_ts = strtotime($end_date);
        $input_ts = strtotime($input_date);

        return (($input_ts >= $start_ts) && ($input_ts <= $end_ts));
    }
}
