<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;
        use DateTime;

use App\Rate;
use App\User;
use App\trip;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
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


    return view('home',compact('array','array2','array3','notication_ids'));
        
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function profile($id = null)
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
       
        return view('profile',compact('array','array2','array3','user','notication_ids','rates','raterUsers'));   




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


                    return view('profile',compact('array','array2','array3','user','notication_ids','rates','raterUsers')); 
                        
        }
        
   

    }
    public function profileChat($id = null)
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
       
        return view('profile',compact('array','array2','array3','user','notication_ids','rates','raterUsers'));   




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

                    


                    return view('profile',compact('array','array2','array3','user','notication_ids','rates','raterUsers')); 
                        
        }
        
   

    }






    public function editprofile(Request $request)
    {
        $user = Auth::User();



        $this->validate($request,[
                'profile_pic' => 'mimes:jpeg,png'
            ]);

        if($request['password'] == $request['confirm_password']){

        $user->update([
        $user['name'] = $request['name'],
        $user['email'] = $user['email'],
        $user['password'] = bcrypt($request['password']),
        $user['profile_pic'] = $request['profile_pic'],
        $user['city'] = $user['city'],
        $user['Mobile'] = $user['Mobile'],
        
        
       ]);

        if (Input::hasFile('profile_pic')) {
        $file = Input::file('profile_pic');
        $file->move(public_path().'/uploads/',$file->getClientOriginalName());
        $url =  URL::to("/").'/uploads/'.$file->getClientOriginalName();
        $user->update(['profile_pic' => $url]);
        return redirect('profile')->with('status', 'Profile updated');

        };


        }
        else{

                return redirect('profile')->with('status', 'Password and Confirm Password not match!');


        }
       

     




}





    public function map()
    {

        $user = User::all();
        $trips = Trip::all();
        $rates=Rate::all();

        $now = new DateTime();
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

        $test = 0;
        return view('map',compact('user','trips','rates','test','notication_ids','array','array2','array3'));

    }
    

     public function dashboard()
    {

        $user = User::all();
        $trips = Trip::all();
        $rates=Rate::all();

        $now = new DateTime();
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

        $test = 0;
        return view('dashboard',compact('user','trips','rates','test','notication_ids','array','array2','array3'));

    }

}
