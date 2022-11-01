<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use DB;
use App\User;
use App\customer;
use App\book_customer;
use App\service_record;
use App\book_customer_vehicle;
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;



class BookingController extends Controller
{
    public function book()
  {
  return view('booking.book_opt');
  }

  public function about()
  {
  return view('about');
  }

  public function service()
  {
  return view('services');
  }

  public function downloads()
  {
  return view('download');
  }

  public function change_data()
  {

    $record = DB::table('users')->get();
    $maxcount=$record->count();
    for($count = 1; $count < $maxcount ; $count++)
    {
    //   $database_customer = User::updateOrCreate(
    //     ['frst_name' => $record[$count]->frst_name,'mobile_no'=>$record[$count]->mobile_no],
    //     ['frst_name' => $record[$count]->frst_name,
    //     'last_name' => $record[$count]->last_name,
    //     'mobile_no'  => $record[$count]->mobile_no,
    //     'address'  => $record[$count]->address,
    //     'password' => $record[$count]->password,
    //     'created_at'  => $record[$count]->created_at,
    //     'updated_at' => $record[$count]->updated_at
    //     ]
    // );
    $user = User::findOrFail($record[$count]->id);
    $user->assignRole('admin');
      // $lower_frst_name=strtolower($record[$count]->frst_name);
      // $frst_name =  ucfirst($lower_frst_name);
      // $lower_last_name=strtolower($record[$count]->last_name);
      // $last_name =  ucfirst($lower_last_name);
      // $raw_mobile=substr($record[$count]->mobile_no, -4);
      // $concat = $frst_name."_".$raw_mobile;
      // $password = Hash::make($concat);
      // $updatebulk=[
      //   'frst_name' => $frst_name,
      //   'last_name' => $last_name,
      //   'password' => $password
      // ];
      // DB::table('customer')->where('id',$record[$count]->id)->update($updatebulk);
      // DB::table('customer')->where('id',$record[$count]->id)->update(array('password' => $password));
  }

  // $user = DB::table('users')->get();
  // dd($user[3]);
}

public function send_sms_part()
  {
       $args = http_build_query(array(
      'token' => config('sms.token'),
      'from'  => config('sms.from'),
      'to'    => 9818033412,
      'text'  => 'Dear Customer,
Your UserID : 9818033412 & Password : Malang_3412. Click here for bill details https://bikerepairsnepal.com.np/customer/bill.
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
  }
  
 public function send_sms_all()
  {

    $users = User::all();
    $total_users=count($users);
    for($count = 1; $count < $total_users ; $count++)
    {
    //   $data[]=$users[$count]->mobile_no;
    // }
    // dd($data);

       $args = http_build_query(array(
      'token' => config('sms.token'),
      'from'  => config('sms.from'),
      'to'    => $users[$count]->mobile_no,
      'text'  => 'Wishing you and your family a very happy and prosperous Dashain!
We will remain closed on the auspicious occasion of Dashain from Sunday, 16 Asoj to Saturday, 22 Asoj.
- Bike Repairs Nepal'));

  

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
}
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
    $book_customer_vehicle = [];
 
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
    
    // $customer_id = DB::table('users')->insertGetId($book_customer);

    $book_customer_vehicle['v_no'] = $request->get('v_no');
    $book_customer_vehicle['date'] = $request->get('date');
    $book_customer_vehicle['distance'] = $request->get('distance');
    $book_customer_vehicle['delivery'] = $request->get('delivery');
    $book_customer_vehicle['v_remarks'] = $request->get('v_remarks');


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
Thank you for booking our service.You will recieve a booking confirmation message from us during office hour. Username - '.$request->get('mobile_no').' & Password - '.$concat.' 
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

    return response()->json([
     'success'  => 'Data Added successfully.'
    ]);
    
  // return view('booking.new_booking');
  }


  
  


  // public function oldbook()
  // {
  // return view('booking.old_booking');
  // }
  // public function oldmobile()
  // {
  // return view('booking.old_mobile');
  // }
}
