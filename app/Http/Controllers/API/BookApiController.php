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
      
      $book_customer=[];
      $book_customer_vehicle = [];
   
      $book_customer['frst_name'] = $request->get('frst_name');
      $book_customer['last_name'] = $request->get('last_name');
      $book_customer['mobile_no'] = $request->get('mobile_no');
      $book_customer['address'] = $request->get('address');
      $book_customer['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
      $book_customer['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
  
      $book_customer_vehicle['v_no'] = $request->get('v_no');
      $book_customer_vehicle['date'] = $request->get('date');
      $book_customer_vehicle['distance'] = $request->get('distance');
      $book_customer_vehicle['delivery'] = $request->get('delivery');
      $book_customer_vehicle['v_remarks'] = $request->get('v_remarks');
  
      $database_customer = book_customer::updateOrCreate(
        ['frst_name' => $book_customer['frst_name'],'mobile_no'=>$book_customer['mobile_no']],
        ['frst_name' => $book_customer['frst_name'],
        'last_name' => $book_customer['last_name'],
        'mobile_no'  => $book_customer['mobile_no'],
        'address'  => $book_customer['address'],
        'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]
    );
  
  
    $customer_id = DB::table('book_customer')->where('mobile_no',$book_customer['mobile_no'])->first();
  
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
        
  return $this->sendResponse($success, 'Booking Request Sent Successfully.');
}

public function book_old_store(Request $request,$id)
{
  // $trial=\Carbon\Carbon::createFromFormat('Y-m-d\TH:i',$request->get('date'));
  // dd($request);
  // $book_customer=[];
  // $book_customer_vehicle = [];
  $records = DB::table('customer_vehicles')
  ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
  ->where('customer_vehicles.id',$id)
  ->select('customer_vehicles.*','users.frst_name','users.last_name','users.mobile_no','users.address')
  ->get();
 
  foreach ($records as $cust) {
    $database_customer = book_customer::updateOrCreate(
          ['frst_name' => $cust->frst_name,'mobile_no'=>$cust->mobile_no],
          ['frst_name' => $cust->frst_name,
          'last_name' => $cust->last_name,
          'mobile_no'  => $cust->mobile_no,
          'address'  => $cust->address,
          'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
          ]
      );
   
  
      $customer_id = DB::table('book_customer')->where('mobile_no',$cust->mobile_no)->first();
    $database_customer_vehicle = book_customer_vehicle::updateOrCreate(
      ['book_customer_id'=>$customer_id->id,'book_v_no'=>$cust->v_no],
      ['book_customer_id' => $customer_id->id,
      'book_v_no' => $cust->v_no,
      'book_date'  => $request->get('date'),
      'book_delivery'  => $cust->delivery,
      'book_distance' => $cust->distance,
      'book_v_remarks'  => $cust->v_remarks,
      'book_v_status' => $cust->v_status,
      'book_work_status'  => $cust->work_status
      ]
  );
}
$booked = DB::table('book_customer_vehicle')::where('book_customer_id',$customer_id->id)->get();
//     $args = http_build_query(array(
//       'token' => config('sms.token'),
//       'from'  => config('sms.from'),
//       'to'    => $customer_id[0]->mobile_no,
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

return $this->sendResponse($booked, 'Booking Request Sent Successfully.');
 
// return view('booking.new_booking');
}


}
