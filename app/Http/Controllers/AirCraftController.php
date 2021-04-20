<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AirCraftController extends Controller
{
    public function newAircraft(){
        return view('content.newaircraft');
    }
}
