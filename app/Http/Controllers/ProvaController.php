<?php

namespace App\Http\Controllers;

use App\Building;
use App\User;
use Illuminate\Http\Request;

class ProvaController extends Controller
{
    public function index(Request $request, $id = 10) {
        return view ('test', [
            'dati' => [
                1, 2, 3, 4, 5, 6, 7 ,8 ,9
            ]
        ]);

        $newbuilding = new Building();

        $newbuilding->codice = 10000;
        $newbuilding->indirizzo = 'via rossi, 10';

        $newbuilding->save();

        $building = Building::where('codice', 1000)->first();

        return view('building', ['building' => $building]);
    }
}
