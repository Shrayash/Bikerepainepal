<?php 
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\User;
// use Mail; 
use Hash;
use Illuminate\Support\Str;
  
class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
       
          $request->validate([
              'mobile_no' => 'required',
          ]);
  
          $token = Str::random(64);
  
          if (User::where('mobile_no', '=', $request->get('mobile_no'))->exists()) {
          
          DB::table('password_resets')->insert([
              'mobile_no' => $request->get('mobile_no'), 
              'token' => $token, 
              'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
           
  
        //   Mail::send('mobile_no.forgetPassword', ['token' => $token], function($message) use($request){
        //       $message->to($request->mobile_no);
        //       $message->subject('Reset Password');
        //   });

        $args = http_build_query(array(
            'token' => config('sms.token'),
            'from'  => config('sms.from'),
            'to'    => $request->get('mobile_no'),
            'text'  => 'Reset Password. Click http://127.0.0.1:8000/reset-password/'.$token.'.
  Warm Regards,
  Bike Repairs Nepal'));
      
        
      
          # Make the call using API.
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, config('sms.url'));
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      
        // Response
          $response = curl_exec($ch);
          $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);
        //   dd($token);
  
          return back()->with('message', 'We have sent you a sms of your password reset link!');
        }
        else{
          return back()->with('message', 'No user record found of this mobile number!');
        }
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'mobile_no' => 'required',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'mobile_no' =>$request->get('mobile_no'), 
                                'token' => $request->get('token')
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user = User::where('mobile_no', $request->get('mobile_no'))
                      ->update(['password' => Hash::make($request->get('password'))]);
 
          DB::table('password_resets')->where(['mobile_no'=> $request->get('mobile_no')])->delete();
  
          return redirect('/login')->with('message', 'Your password has been changed!');
      }
}