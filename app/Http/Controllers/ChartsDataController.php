<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DateTime;
use DB;

class ChartsDataController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Not Authenticated']);
        }

        if (!$request->has(['dimension', 'start', 'end'])) {
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
            ->select(DB::raw('DATE(time) AS date, ROUND(AVG(value), 2) as value'))
            ->where('physical_dimension_id', $input['dimension'])
            ->whereBetween('time', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->groupBy('date')
            ->get();

        if (count($measurements) == 0) {
            return response()->json(['error' => 'No data found for this period!']);
        }

        $unit = DB::table('physical_dimension')
            ->where('physical_dimension_id', $input['dimension'])
            ->pluck('unit_of_measure')[0];

        return response()->json(['unit' => $unit, 'measurements' => $measurements]);
    }
}
