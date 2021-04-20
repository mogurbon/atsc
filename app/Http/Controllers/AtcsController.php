<?php

namespace App\Http\Controllers;

use App\Models\queueatc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtcsController extends Controller
{
    public function index(){
        return view('content.content');
        #return view('main');
    }
    public function savequeue(Request $request){
       # dd($request->all());
        $queue =$request->get('queue');
        DB::table('queueatcs')->truncate();
        for($i = 0, $num = count($queue); $i < $num; $i++ ){
            $queue[$i]['date'] = date("d-m-Y: H:i:s");
        }

        $queueatc = new queueatc();
        $queueatc->queue= $queue;
        $queueatc->save();
    }

}
