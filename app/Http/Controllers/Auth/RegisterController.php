<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Mail\ConfirmationEmail;
use Mail;



use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'city' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'Mobile' => 'required|max:12',
            'profile_pic' =>'required'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'city'  => $data['city'],
            'password' => bcrypt($data['password']),
            'Mobile' => $data['Mobile'],
            'profile_pic' =>$data['profile_pic']
        ]);

        if (Input::hasFile('profile_pic')) {
        $file = Input::file('profile_pic');
        $file->move(public_path().'/uploads/',$file->getClientOriginalName());
        $url =  URL::to("/").'/uploads/'.$file->getClientOriginalName();
        $user->update(['profile_pic' => $url]);
        return $user;

        };
        if (Input::hasFile('profile_id')) {
        $file = Input::file('profile_id');
        $file->move(public_path().'/uploads/',$file->getClientOriginalName());
        $url =  URL::to("/").'/uploads/'.$file->getClientOriginalName();
        $user->update(['profile_id' => $url]);
        return $user;

        };



    }


     protected function register(Request $request)
    {
       $input = $request->all();
       $validator = $this->validator($input);

       if($validator->passes())
       {
        $data = $this->create($input)->toArray();
        $data['token'] = str_random(25);
        $user = User::find($data['id']);
        $user->token = $data['token'];

        $user->save();

        Mail::send('emails.confirmation',$data , function($message) use($data){

            $message->to($data['email']);
            $message->subject('Registeration Confirm');
            
        });

        return redirect(route('login'))->with('confirm_email','confirmation Email Has been sent to Your Email');


       }
               return redirect(route('login'))->with('confirm_email',$validator->errors());

       
    }
    public function confirmation($token)
    {
        $user = User::where('token',$token)->first();

        if(!is_null($user))
        {
            $user->confirmed = 1;
            $user->token = '';
            $user->save();

            return redirect(route('login'))->with('confirm_email','Email Activated Successfully');

        }
            return redirect(route('login'))->with('confirm_email','Something went wrong');

    }

}
