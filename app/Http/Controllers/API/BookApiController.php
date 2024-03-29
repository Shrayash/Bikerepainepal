<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use DB;
use App\Inventory;
use App\Order;
use App\category;
use App\User;
use App\book_customer;
use App\service_record;
use App\book_customer_vehicle;
use App\customer_vehicles;
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use App\Notifications\StatusChange;
use App\Notifications\RolesChange;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Booking as Book;
use Illuminate\Support\Facades\Auth;



use Illuminate\Support\Facades\Hash;





class BookApiController extends BaseController
{

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
       

    $args = http_build_query(array(
        'token' => config('sms.token'),
        'from'  => config('sms.from'),
        'to'    => $request->get('mobile_no'),
        'text'  => 'Reset Password. Click https://bikerepairsnepal.com.np/api/reset-password/'.$token.'.
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
      $data=[];
      $data['token'] = $token;
      $data['mobile_no'] = $request->get('mobile_no');
    //   dd($token);
    return $this->sendResponse($data, 'We are on the process of resetting your password!');
  }
  else{
    $data=[];
    return $this->sendResponse($data, 'No user record found of this mobile number!');
    // return back()->with('message', 'No user record found of this mobile number!');
  }
      // return back()->with('message', 'We have sent you a sms of your password reset link!');
  }
  /**
   * Write code on Method
   *
   * @return response()
   */
  // public function showResetPasswordForm($token) { 
  //    return view('auth.forgetPasswordLink', ['token' => $token]);
  // }

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

      if (User::where('mobile_no', '=', $request->get('mobile_no'))->exists()) {

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

      $user_detail = User::where('mobile_no', $request->get('mobile_no'))->get();

      return $this->sendResponse($user_detail, 'Your password has been changed!');
    }else{
        $data=[];
        return $this->sendResponse($data, 'No user record found of this mobile number!');
        // return back()->with('message', 'No user record found of this mobile number!');
      }
     
  }


    public function new_book_store(Request $request)
    {
      $values = array(
        'mobile_no' => 'required|unique:users,mobile_no|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
      );
      $error = Validator::make($request->all(), $values);
      if($error->fails())
      {
        // return Redirect::to('register')->withErrors($error);
      return response()->json([
        'error'  => $error->errors()->all()
      ]);
      }
      $book_customer=[];
      // $book_customer_vehicle = [];
   
      $lower_frst_name=strtolower($request->get('frst_name'));
      $lower_last_name=strtolower($request->get('last_name'));      
      $book_customer['frst_name'] = ucfirst($lower_frst_name);
      $book_customer['last_name'] = ucfirst($lower_last_name);
      $book_customer['mobile_no'] = $request->get('mobile_no');
      $raw_mobile=substr($book_customer['mobile_no'], -4);
      $concat = $book_customer['frst_name']."_".$raw_mobile;
      $book_customer['address'] = $request->get('address');
      $book_customer['password'] = Hash::make($concat);
      $book_customer['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
      $book_customer['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
  
      $book_customer['v_no'] = $request->get('v_no');
      $book_customer['date'] = $request->get('date');
      $book_customer['distance'] = $request->get('distance');
      $book_customer['delivery'] = $request->get('delivery');
      $book_customer['v_remarks'] = $request->get('v_remarks');
  
      $database_customer = User::updateOrCreate(
        ['frst_name' => $book_customer['frst_name'],'mobile_no'=>$book_customer['mobile_no']],
        ['frst_name' => $book_customer['frst_name'],
        'last_name' => $book_customer['last_name'],
        'mobile_no'  => $book_customer['mobile_no'],
        'address'  => $book_customer['address'],
        'password' => $book_customer['password'],
        'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]
    );
  
    
  
    $customer_id = DB::table('users')->where('mobile_no',$book_customer['mobile_no'])->first();
  
    $user = User::findOrFail($customer_id->id);
    $user->assignRole('admin');
  
    $info='reg';
         
         
    $maxcount=count( $book_customer['v_no']);
   for($count = 0; $count < $maxcount ; $count++)
   {
       
    $data = array(
     'customer_id' =>  $customer_id->id,
     'v_no' =>   $book_customer['v_no'][$count],
     'distance'  => '0',
     'preinfo'  =>  $info,
     'delivery'  => 'self',
     'v_remarks'  => $book_customer['v_remarks'][$count],
     'booked_at'  => \Carbon\Carbon::now()->toDateTimeString()
    );
    $insert_data[] = $data; 
   }
   customer_vehicles::insert($insert_data);
  //  $user = User::findOrFail( $id);
  //  $user->assignRole('admin');
  
  //   $maxcount=count( $book_customer_vehicle['v_no']);
  //     for($count = 0; $count < $maxcount ; $count++)
  //     {
  //   $database_customer_vehicle = book_customer_vehicle::updateOrCreate(
  //   ['book_customer_id'=>$customer_id->id,'book_v_no'=>$book_customer_vehicle['v_no'][$count]],
  //   ['book_customer_id' => $customer_id->id,
  //   'book_v_no' =>   $book_customer_vehicle['v_no'][$count],
  //   'book_date'  => $book_customer_vehicle['date'][$count],
  //   'book_distance'=>$book_customer_vehicle['distance'][$count],
  //   'book_delivery'  => $book_customer_vehicle['delivery'][$count],
  //   'book_v_remarks'  => $book_customer_vehicle['v_remarks'][$count]
  //   ]
  // );
  //     }
     
      $args = http_build_query(array(
        'token' => config('sms.token'),
        'from'  => config('sms.from'),
        'to'    => $request->get('mobile_no'),
        'text'  => 'Dear Customer,
Welcome to Bike Repairs Nepal! Your User-ID is '.$request->get('mobile_no').' & Password is '.$concat.'
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

  
  //     $args = http_build_query(array(
  //       'token' => config('sms.token'),
  //       'from'  => config('sms.from'),
  //       'to'    => $request->get('mobile_no'),
  //       'text'  => 'Dear Customer,
  // Thank you for booking our service.You will recieve a booking confirmation message/call from us during office hour. 
  // Warm Regards,
  // Bike Repairs Nepal'));
  
    
  
  //     # Make the call using API.
  //     $ch = curl_init();
  //     curl_setopt($ch, CURLOPT_URL, config('sms.url'));
  //     curl_setopt($ch, CURLOPT_POST, 1);
  //     curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
  //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
  //   // Response
  //     $response = curl_exec($ch);
  //     $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  //     curl_close($ch);
        
  return $this->sendResponse($book_customer, 'User Registration Successful.');
}

public function show_category()
{
  // $alldata ="hello";
  // return $this->sendResponse($alldata, 'Welcome to BRN Online Shop!');
  $alldata=[];
  $alldata['inventory'] = Inventory::all();
  $alldata['category'] = category::all();
    return $this->sendResponse($alldata, 'Welcome to BRN Online Shop!');
    // return view('inventory.show',['inventory'=>$inventory,'category'=>compact('category')]);
}



public function category_items($id)
{
  $alldata=[];
  $alldata['inventory'] = DB::table('inventories')->where('category_id',$id)->get();
  $alldata['category'] = category::all();


    return $this->sendResponse($alldata, 'Explore over our products!');
    // return view('inventory.category_items',['inventory'=>$inventory,'category'=>compact('category'),'category_id'=>$category_id[0]->id]);
}



    public function items_details($id)
    {
      $details=[];
        // $category_id = category::where('slug',$slug)->select('id')->get();
       
        $details['inventory'] = Inventory::where('id',$id)->get();
        // $cat_id = $details['inventory']->category_id;
        // $details['product_info'] = category::findOrFail($cat_id);
        // $details['all_category'] = category::all();

        return $this->sendResponse($details, 'Explore over our products!');
    }


}
