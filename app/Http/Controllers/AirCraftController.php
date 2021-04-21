<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aircraft;

class AirCraftController extends Controller
{
    public function newAircraft(){
        return view('content.newaircraft');
    }
    public function getAirCrafts(){
        return aircraft::all();
    }

}
