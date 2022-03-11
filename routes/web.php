<?php

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\User;
use App\Message;

use Illuminate\Support\Facades\DB;



Route::get('/', function () {
	if(Auth::User())
		{
		$array = array();
        $array2 = array();
        $array3 = array();
        $notication_ids = array();

        $x = auth()->user()->unreadnotifications;
        for ($i=0; $i < count($x); $i++) { 

        if($x[$i]['type'] == 'App\Notifications\repliedToThread')
        {
            $y = User::where('id','LIKE',$x[$i]['data']['user']['id'])->get();

            array_push($array, $y);
                        array_push($notication_ids, $x[$i]['id']);

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
    return view('home',compact('array','array2','array3','notication_ids'));
    
		}
		else{
			return view('welcome');
		}   
});

Route::get('/test',function(){
	return view('Test');
});



Route::get('getData','AjaxControleer@getData');




Auth::routes();

Route::get('searchy',function(){

	return view('search');
});


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['web']],function(){

	Route::get('connect/{id}/{trip_id}','TripController@Connect');


	Route::post('createTrip',[
		'uses'=>'TripController@createTrip',
		'as'=>'createTrip',
		'middleware'=>'auth'
	]);

	Route::get('profile/{id?}',[
		'uses'=>'HomeController@profile',
		'as'=>'profile/{id?}',
		'middleware'=>'auth'
	]);




	
	Route::post('editprofile',[
	'uses'=>'HomeController@editprofile',
	'as'=>'editprofile',
	'middleware'=>'auth'
	]);
	



	Route::get('/AcceptRequest/{id}/{notifiable}',[
		'uses'=>'TripController@requesty',
		'as'=>'requesty',
		'middleware'=>'auth'

	]);

	Route::get('/RefuseRequest/{id}/{notifiable}',[
		'uses'=>'TripController@refuserequest',
		'as'=>'refuserequest',
		'middleware'=>'auth'

	]);

	



	Route::get('/trips/{id?}','TripController@trips');

	Route::get('logout','HomeController@logout');

	Route::get('map','HomeController@map');

Route::get('/request',function(){
 		$id = [];
 		$i = 0;
 		$tests =array();
        $NotificationsRequests = auth()->user()->notifications->where('type','App\Notifications\requests');
        foreach ($NotificationsRequests as $value) {
        	$id[$i] = User::where("id",$value['data']['trip_user']['id'])->get();

        	array_push($tests, $value['data']['test']);
        $i++;
        }

        return view('partials.requests',compact('NotificationsRequests','id','tests'));
  
});

	Route::get('markasread',function(){

	auth()->user()->unreadnotifications->where('type','LIKE','App\Notifications\requests')->markAsRead();
	});

	Route::get('chat',function(){
		  $notication_ids = array();
          $array = array();
                    $array2 = array();
                    $array3 = array();
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
        $notificationAccepted = auth()->user()->notifications->where('type','App\Notifications\requests');
        $arrayOfAccepted = array();
        $messagesArray = array();

        foreach ($notificationAccepted as $value) {

        	if($value['data']['test'] == 'true')
        	{
        		$user = User::where('id',$value['data']['trip_user']['id'])->get();

        			array_push($arrayOfAccepted, $user);	

        		$message = Message::where('user_id',$value['data']['trip_user']['id'])->get();	
        		array_push($messagesArray , $message);

        		


        		
        	}

        	
        	
        }

        return view('chat',compact('notication_ids','array','array2','array3','arrayOfAccepted','messagesArray'));


	});


	Route::get('markThisAsRead/{id}',function($id){

	auth()->user()->unreadnotifications->where('id','LIKE',$id)->markasread();

	return view('test2');
		

	});

	Route::post('rate/{id}','TripController@rate');
	 
});

Route::get('/users/confirmation/{token}','Auth\RegisterController@confirmation')->name('confirmation');

Route::get('/dashboard','HomeController@dashboard');



Route::get('test2',function(){

	$array3 = 'Welcome';
	$notication_ids = array();
	$x = auth()->user()->unreadnotifications;
	for ($i=0; $i < count(auth()->user()->unreadnotifications); $i++) { 
		array_push($notication_ids, $x[$i]['id']);
		}


	return view('test2',compact('array3','notication_ids'));

	
});

Route::get('profileChat/{id}', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::get('searchFortrip',[

    'uses'=>'TripController@searchFortrip',
    'as'=>'searchFortrip',
    'middleware'=>'auth'

]);