<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function trains()
    {

        return view('trains');

    }
}
