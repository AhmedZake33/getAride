<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;

use App\Notifications\repliedToThread;

use App\Notifications\requests;



use App\Trip;
use App\User;
use App\State;
use App\Rate;
use DB;


class TripController extends Controller
{
	public function searchFortrip(Request $request)
	{

		if($request->ajax())
		{
			

			
			$allTrip = 	Trip::where('from_point','LIKE',$request['name1'])->get();

			
			return response($allTrip);
			



		}



		
		
	}
	public function requesty($id,$notifiable)
	{
		$state = new State();


		$state->requester = $id;
		$state->state = 'true'; 
		auth()->user()->states()->save($state);
		$test = 'true';


			auth()->user()->unreadnotifications->where('id','LIKE',$notifiable)->markasread();

		$user = User::where('id','LIKE',$id)->get();
		$user[0]->notify(new requests(auth()->user(),$user[0],$test));
		return redirect()->route('home');


	}

	public function refuserequest($id,$notifiable)
	{
		$state = new State();
		$state->requester = $id;
		$state->state = 'False';
		$test = 'false';
					auth()->user()->unreadnotifications->where('id','LIKE',$notifiable)->markasread();

		auth()->user()->states()->save($state);
		$user = User::where('id','LIKE',$id)->get();
		$user[0]->notify(new requests(auth()->user(),$user[0],$test));
		return redirect()->route('home');

	}

	public function createTrip(Request $request)
	{
		$this->validate($request,[
			'from'=>'required',
			'to'=>'required',
			'date'=>'required',
			'time'=>'required',
			'price'=>'required',
			'seats'=>'required',
			'car_number'=>'required',
			'car_type'=>'required',
			'details'=>'required',

		]);

		$trip = new Trip();

		$trip->from_point = $request['from'];
		$trip->to_point = $request['to'];
		$trip->waypoint1 = $request['waypoint1'];
		$trip->waypoint2 = $request['waypoint2'];
		$trip->TakeoffDate = $request['date'];
		$trip->TakeOffTime = $request['time'];
		$trip->price= $request['price'];
		$trip->seats = $request['seats'];
		$trip->car_number = $request['car_number'];
		$trip->car_type = $request['car_type'];
		$trip->Details = $request['details'];
		$message = 'Message Created Successfully';

		if($request->user()->trips()->save($trip)){

			


			return redirect()->route('home')->with(['message'=>$message]);
		};



	}


public function trips()
{
	if(Auth::User())
		{


	$trips = Trip::orderBy('created_at','desc')->get();

        $array = array();
        $array2 = array();
        $array3 = array();
        $notication_ids = array();

        $x = auth()->user()->unreadnotifications;
        for ($i=0; $i < count($x); $i++) { 

        if($x[$i]['type'] == 'App\Notifications\repliedToThread')
        {
            $y = User::where('id','LIKE',$x[$i]['data']['user']['id'])->get();
            array_push($notication_ids, $x[$i]['id']);


            array_push($array, $y);
        }

        else{

            if($x[$i]['data']['test'] == 'false')
            {
                $test = 'false';
                array_push($array3, $test);

            }
            else{
                $test = 'true';
                array_push($array3, $test);
            }
            

            $y = User::where('id','LIKE',$x[$i]['data']['trip_user']['id'])->get();

            array_push($array2, $y);


        }

        
    }
$rates = Rate::all();


    return view('trips',compact('trips','array','array2','array3','notication_ids','rates'));
   }
   else
{
 return view('welcome');
}

}	

public function Connect($user_id,$trip_id)
{
	
	$usery = User::where('id',"LIKE",$user_id)->get();
	$tripy = DB::table('trips')->where('id','LIKE',$trip_id)->get();


	$usery[0]->notify(new repliedToThread($tripy,auth()->user()));
	return redirect()->back();
}

public function rate(Request $request , $id)
{
	
	$rate = new Rate();

	$rate->requester = $id;
	$rate->rate = $request['reviewStars'];
	$rate->review= $request['review'];

	$request->user()->rates()->save($rate);
	return redirect()->back();
}

	
}
