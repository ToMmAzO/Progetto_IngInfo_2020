<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Room;
use DB;
use DateTime;
use DateInterval;

class ChartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        try {
            $room = Room::where('room_id', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home');
        }

        $measurementQuery = DB::table('sensor')
            ->join('physical_dimension', 'physical_dimension.sensor_id', '=', 'sensor.sensor_id')
            ->join('measurement', 'measurement.physical_dimension_id', '=', 'physical_dimension.physical_dimension_id')
            ->where('room_id', $id);

        $latestDateQuery = clone $measurementQuery;

        // Prendo la data più recente sottraggo 7 giorni per ottenere la data di inizio misurazioni
        $latestRow = $latestDateQuery->latest('time')->first();

        if (!isset($latestRow)) {
            return view('charts', ['r' => $room, 'error' => 'No data found!']);
        }

        $endDate = date('d/m/Y', strtotime($latestRow->time));
        $startDate = (DateTime::createFromFormat('d/m/Y', $endDate))->sub(new DateInterval('P7D'))
            ->format('d/m/Y');

        // Prendo le dimensioni misurate in questo arco temporale
        $dimensionsData = $measurementQuery
            ->select('name', 'unit_of_measure')
            ->distinct()
            ->get();

        $dimensions = array();
        foreach ($dimensionsData as $d) {
            array_push($dimensions, array(
                "name" => $d->name,
                "unit" => $d->unit_of_measure));
        }

        return view('charts', ['r' => $room, 'endDate' => $endDate, 'startDate' => $startDate,
            'dimensions' => $dimensions]);
    }
}
