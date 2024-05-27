<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index()
    {
        $date = Carbon::now();

        $trains = Train::where('departure_time', '>=', $date)->get();
        // Qui andava fatta una where, anzichè recuperare tutti i file.

        //dump($date);

        return view('trains', compact('trains'));

    }
}
