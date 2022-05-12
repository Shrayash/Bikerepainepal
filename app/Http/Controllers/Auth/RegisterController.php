<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Mail;
use App\Mail\verifyEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUser;
use App\model_has_roles;
use Spatie\Permission\Models\Role;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verifyToken' => Str::random(40),
        ]);
        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);
        $superadmin = User::role('superadmin')->get();
        Notification::send($superadmin, new NewUser($thisUser));
        return $user;
    }
    public function verify(){
        return view('home')->with('message','Please check your email for verification process!');
        // $value='Please check your email for the verification process.';
        // return view('norole')->with('value',$value);
    }
    public function sendEmail($thisUser){
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }
    public function emailsent($email,$verifyToken){
        $user=User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();

        if($user){
            User::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>'1','verifyToken'=>NULL]);
            return view('home')->with('message','Your Account is Verified!');
        }else{
            return 'user not found';
        }
          
    }
    
}
