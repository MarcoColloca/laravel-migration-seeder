<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index()
    {
        $date = Carbon::now();;

        $trains = Train::all();

        //dump($date);

        return view('trains', compact('trains'), compact('date'));

    }
}
