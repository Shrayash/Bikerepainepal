<?php

namespace App\Http\Controllers;
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


class BookingController extends Controller
{
    public function book()
  {
  return view('booking.book_opt');
  }

  public function newbook()
  {
    
  return view('booking.new_booking');
  }

  public function booked()
  {
    
  return view('booking.wait_book');
  }

  // public function sms_bill($id)
  // {
  //     $record = DB::table('service_record')->where('invoice_no',$id)->get();
  //     return view('service.sms',['records'=>$record]);
  // }

 

  public function book_store(Request $request)
  {
    // $trial=\Carbon\Carbon::createFromFormat('Y-m-d\TH:i',$request->get('date'));
    // dd($request);
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

    return response()->json([
     'success'  => 'Data Added successfully.'
    ]);
    
  // return view('booking.new_booking');
  }


  
  


  public function oldbook()
  {
  return view('booking.old_booking');
  }
  public function oldmobile()
  {
  return view('booking.old_mobile');
  }
}
