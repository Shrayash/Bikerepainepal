<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use DB;
use App\User;
use App\book_customer;
use App\service_record;
use App\book_customer_vehicle;
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Booking as Book;
use Illuminate\Support\Facades\Auth;




class BookApiController extends BaseController
{
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
  
  
  
    $maxcount=count( $book_customer_vehicle['v_no']);
      for($count = 0; $count < $maxcount ; $count++)
      {
    $database_customer_vehicle = book_customer_vehicle::updateOrCreate(
    ['book_customer_id'=>$customer_id->id,'book_v_no'=>$book_customer_vehicle['v_no'][$count]],
    ['book_customer_id' => $customer_id->id,
    'book_v_no' =>   $book_customer_vehicle['v_no'][$count],
    'book_date'  => $book_customer_vehicle['date'][$count],
    'book_distance'=>$book_customer_vehicle['distance'][$count],
    'book_delivery'  => $book_customer_vehicle['delivery'][$count],
    'book_v_remarks'  => $book_customer_vehicle['v_remarks'][$count]
    ]
  );
      }
     
  
      $args = http_build_query(array(
        'token' => config('sms.token'),
        'from'  => config('sms.from'),
        'to'    => $request->get('mobile_no'),
        'text'  => 'Dear Customer,
  Thank you for booking our service.You will recieve a booking confirmation message/call from us during office hour. 
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
        
  return $this->sendResponse($book_customer, 'Booking Request Sent Successfully.');
}




}
