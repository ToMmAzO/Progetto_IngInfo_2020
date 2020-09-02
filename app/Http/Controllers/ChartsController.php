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
        $endDate = date('d/m/Y', strtotime($latestDateQuery->latest('time')->first()->time));
        $startDate = (DateTime::createFromFormat('d/m/Y', $endDate))->sub(new DateInterval('P7D'))
            ->format('d/m/Y');

        // Prendo gli ID delle dimensioni misurate in questo arco temporale
        $dimensions_id = $measurementQuery
            ->select('physical_dimension.physical_dimension_id')
            ->groupBy('physical_dimension.physical_dimension_id')
            ->pluck('physical_dimension.physical_dimension_id')
            ->toArray();

        // Prendo tutte le informazioni riguardo le dimensioni fisiche misurate
        $dimensions = DB::table('physical_dimension')
            ->whereIn('physical_dimension_id', $dimensions_id)
            ->get();

        return view('charts', ['r' => $room, 'endDate' => $endDate, 'startDate' => $startDate,
            'dimensions' => $dimensions]);
    }
}
