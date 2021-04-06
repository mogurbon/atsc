<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtcsController extends Controller
{
    public function index(){
        return view('content.content');
        #return view('main');
    }
}
