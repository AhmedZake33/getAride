<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trip;
use App\User;

use DB;


class AjaxControleer extends Controller
{
    public function getData(Request $request)
    {
    	if($request->ajax()){

    	 $array = array();
         $user = array();
    	$trips =DB::table('trips')->Where('from_point','LIKE',$request['searchinput'])->get();    	
    	if($trips)
    	{
    		array_push($array, $trips);
    		foreach ($trips as $trip) {

    			$users = DB::table('users')->where('id','LIKE',$trip->user_id)->get();

    			array_push($array, $users);
    			
    		}
    		return Response($array);	
    	}
    	else{

    		return Response();
    	}
    	
    }
    }


   }
