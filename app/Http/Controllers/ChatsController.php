<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Rate;


class ChatsController extends Controller
{
    public function __construct()
{
  $this->middleware('auth');
}

/**
 * Show chats
 *
 * @return \Illuminate\Http\Response
 */
public function index($id)
{
   $notication_ids = array();
        $rates = array();
        $raterUsers = array();

        if($id != null)
        {
            $user = User::where('id','LIKE',$id)->get();
            $rate = Rate::where('requester' , 'LIKE' , $id)->get();
            array_push($rates, $rate);
            foreach ($rates as $raty) {
                for ($i=0; $i < count($raty); $i++) { 

                    $usery = User::where('id','LIKE',$raty[$i]['user_id'])->get();
                    $usernme = $usery[0]['name'];
                    array_push($raterUsers, $usery);


                    
                }
            }
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
       
        return view('profileChat',compact('array','array2','array3','user','notication_ids','rates','raterUsers'));   




        }
        else
        {
           $id = Auth::User()->id;
            $user = User::where('id','LIKE',$id)->get();
            $rate = Rate::where('requester','LIKE',$id)->get();
            array_push($rates, $rate);
            foreach ($rates as $raty) {
                for ($i=0; $i < count($raty); $i++) { 

                    $usery = User::where('id','LIKE',$raty[$i]['user_id'])->get();
                    $usernme = $usery[0]['name'];
                    array_push($raterUsers, $usery);
                    
                }
            }
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


                    return view('profileChat',compact('array','array2','array3','user','notication_ids','rates','raterUsers')); 
                        
        }
        
   
}

/**
 * Fetch all messages
 *
 * @return Message
 */
public function fetchMessages()
{
  return Message::with('user')->get();
}

/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */
public function sendMessage(Request $request)
{
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);

  broadcast(new MessageSent($user, $message))->toOthers();

  return ['status' => 'Message Sent!'];
}
}
