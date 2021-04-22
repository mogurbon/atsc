<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aircraft;
use Illuminate\Support\Facades\DB;

class AirCraftController extends Controller
{
    public function newAircraft(){
        return view('content.newaircraft');
    }
    public function getAirCrafts(){
        return aircraft::all();
    }
    public function store(Request $request){
        try{
            DB::beginTransaction();
            $aircraft = new aircraft();
            $aircraft->name =  $request->input('name');
            $aircraft->size_id = $request->input('size_id');
            $aircraft->type_id = $request->input('type_id');
            $aircraft->save();
            DB::commit();
            $response = ['object' => null, 'error' => false, 'message' => 'Aicraft Stored'];
        }catch (\Exception $e){
            DB::rollback();
            $response = ['object' => null, 'error' => true, 'message' => $e->getMessage()];
        }
        return $response;
    }

}
