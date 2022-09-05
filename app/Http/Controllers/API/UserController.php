<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use DB;
use App\User;

use App\customer_vehicles;
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

class UserController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ongoing(Request $request)
    {
   
        $services = DB::table('service_activities')
        ->join('customer_vehicles', 'service_activities.vehicle_id', '=', 'customer_vehicles.id')
        ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
        ->where('customer_vehicles.v_status','active')
        ->where('service_activities.work_status','ongoing')
        ->where('customer_vehicles.customer_id',auth()->user()->id)
        ->select('service_activities.*', 'customer_vehicles.customer_id','customer_vehicles.v_no','users.frst_name','users.last_name','users.mobile_no')
        ->get();
        
        return $this->sendResponse($services, 'Retrieved ongoing services success.');
        // return view('service.ongoing_service.show')->with('services', $services);
    }

    public function resolved(Request $request)
    {
        $service_records =DB::table('service_record')
        ->join('customer_vehicles', 'service_record.vehicle_id', '=', 'customer_vehicles.id')
        ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
        ->select('service_record.*', 'customer_vehicles.customer_id','customer_vehicles.v_no','users.frst_name','users.last_name','users.mobile_no')
        ->where('customer_vehicles.customer_id',auth()->user()->id)
        ->latest()->get();

        return $this->sendResponse($service_records, 'Retrieved resolved services success.');
        // return view('service.resolved_service.show',['records'=>$service_records]);
    }


    public function update_user(Request $request)
    {
      $values = array(
        'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
      );
      $error = Validator::make($request->all(), $values);
      if($error->fails())
      {
        // return Redirect::to('register')->withErrors($error);
      return response()->json([
        'error'  => $error->errors()->all()
      ]);
      }
    $customer=[];
    $customer['frst_name'] = $request->get('frst_name');
    $customer['last_name'] = $request->get('last_name');
    $customer['mobile_no'] = $request->get('mobile_no');
    $customer['address'] = $request->get('address');
    $customer['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
    $customer['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
   
    DB::table('users')->where('id',auth()->user()->id)->update($customer);

  //     $records = DB::table('customer_vehicles')
  // ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
  // ->where('customer_vehicles.customer_id',auth()->user()->id)
  // ->select('customer_vehicles.*','users.frst_name','users.last_name','users.mobile_no','users.address')
  // ->get();

  $records = DB::table('users')
  ->where('id',auth()->user()->id)
  ->get();

    return $this->sendResponse($records, 'Personal User Data Updated successfully.');
  }



  public function update_vehicle(Request $request,$id)
    {
      
    $customer_vehicle = [];
    $customer_vehicle['v_no'] = $request->get('v_no');
    $customer_vehicle['distance'] = $request->get('distance');
    $customer_vehicle['delivery'] = $request->get('delivery');
    $customer_vehicle['v_remarks'] = $request->get('v_remarks');
    $customer_vehicle['v_status'] = $request->get('v_status');
    $info='reg';

    DB::table('customer_vehicles')->where('id',$id)->update($customer_vehicle);

    $records = DB::table('customer_vehicles')
    ->where('id',$id)
    ->get();
   
  //     $records = DB::table('customer_vehicles')
  // ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
  // ->where('customer_vehicles.customer_id',auth()->user()->id)
  // ->select('customer_vehicles.*','users.frst_name','users.last_name','users.mobile_no','users.address')
  // ->get();

    return $this->sendResponse($records, 'Vehicle Data Updated successfully.');
  }


  public function new_vehicles_add(Request $request)
    {
      
    $customer_vehicle = [];
    $customer_vehicle['v_no'] = $request->get('v_no');
    $customer_vehicle['distance'] = $request->get('distance');
    $customer_vehicle['delivery'] = $request->get('delivery');
    $customer_vehicle['v_remarks'] = $request->get('v_remarks');
    $customer_vehicle['v_status'] = 'active';
    $info='reg';

      $maxcount=count( $customer_vehicle['v_no']);
      // $customer_id = DB::table('customer_vehicles')->where('customer_id',auth()->user()->id)->select('id')->get();
     for($count = 0; $count < $maxcount ; $count++)
     {
        $databases = customer_vehicles::updateOrCreate(
          ['v_no'=> $customer_vehicle['v_no'][$count],'customer_id'=>auth()->user()->id],
          ['customer_id' => auth()->user()->id,
          'v_no' =>   $customer_vehicle['v_no'][$count],
          'distance'  => $customer_vehicle['distance'][$count],
          'preinfo'  =>  $info,
          'delivery'  => $customer_vehicle['delivery'][$count],
          'v_remarks'  => $customer_vehicle['v_remarks'][$count],
          'v_status' => $customer_vehicle['v_status'],
          'booked_at'  => \Carbon\Carbon::now()->toDateTimeString()
          ]
      );
    }
      $records = DB::table('customer_vehicles')
  ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
  ->where('customer_vehicles.customer_id',auth()->user()->id)
  ->select('customer_vehicles.*')
  ->get();

    return $this->sendResponse($records, 'New vehicle/s added successfully.');
  }


  //   public function update(Request $request)
  //   {
  //     $values = array(
  //       'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
  //     );
  //     $error = Validator::make($request->all(), $values);
  //     if($error->fails())
  //     {
  //       // return Redirect::to('register')->withErrors($error);
  //     return response()->json([
  //       'error'  => $error->errors()->all()
  //     ]);
  //     }
  //   $customer=[];
  //   $customer_vehicle = [];
  
  //   $customer['frst_name'] = $request->get('frst_name');
  //   $customer['last_name'] = $request->get('last_name');
  //   $customer['mobile_no'] = $request->get('mobile_no');
  //   $customer['address'] = $request->get('address');
  //   $customer['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
  //   $customer['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
   
  //   DB::table('users')->where('id',auth()->user()->id)->update($customer);

  //   $customer_vehicle['v_no'] = $request->get('v_no');
  //   $customer_vehicle['distance'] = $request->get('distance');
  //   $customer_vehicle['delivery'] = $request->get('delivery');
  //   $customer_vehicle['v_remarks'] = $request->get('v_remarks');
  //   $customer_vehicle['v_status'] = $request->get('v_status');
  //   $info='reg';
   
  //     $maxcount=count( $customer_vehicle['v_no']);
  //     $customer_id = DB::table('customer_vehicles')->where('customer_id',auth()->user()->id)->select('id')->get();
     
  //    for($count = 0; $count < $maxcount ; $count++)
  //    {
  //       $c_id= (count($customer_id)>$count) ? $customer_id[$count]->id : 0;
  //       $databases = customer_vehicles::updateOrCreate(
  //         ['id'=>$c_id, 'customer_id'=>auth()->user()->id],
  //         ['customer_id' => auth()->user()->id,
  //         'v_no' =>   $customer_vehicle['v_no'][$count],
  //         'distance'  => $customer_vehicle['distance'][$count],
  //         'preinfo'  =>  $info,
  //         'delivery'  => $customer_vehicle['delivery'][$count],
  //         'v_remarks'  => $customer_vehicle['v_remarks'][$count],
  //         'v_status' => $customer_vehicle['v_status'][$count],
  //         'booked_at'  => \Carbon\Carbon::now()->toDateTimeString()
  //         ]
  //     );
  //   }
  //     $records = DB::table('customer_vehicles')
  // ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
  // ->where('customer_vehicles.customer_id',auth()->user()->id)
  // ->select('customer_vehicles.*','users.frst_name','users.last_name','users.mobile_no','users.address')
  // ->get();

  //   return $this->sendResponse($records, 'Personal Data Updated successfully.');
  // }

  //   public function update(Request $request)
  //   {
   
  //   $customer=[];
  //   $customer_vehicle = [];
  
  //   $customer['frst_name'] = $request->get('frst_name');
  //   $customer['last_name'] = $request->get('last_name');
  //   $customer['mobile_no'] = $request->get('mobile_no');
  //   $customer['address'] = $request->get('address');
  //   // $customer['id'] = Str::id($request->get('frst_name'));
  //   $customer['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
  //   $customer['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
   
  //   DB::table('users')->where('id',auth()->user()->id)->update($customer);

  //   $customer_vehicle['v_no'] = $request->get('v_no');
  //   $customer_vehicle['distance'] = $request->get('distance');
  //   $customer_vehicle['delivery'] = $request->get('delivery');
  //   $customer_vehicle['v_remarks'] = $request->get('v_remarks');
  //   $customer_vehicle['v_status'] = $request->get('v_status');
  //   $info='reg';
   
  //     $maxcount=count( $customer_vehicle['v_no']);
  //     $customer_id = DB::table('customer_vehicles')->where('customer_id',auth()->user()->id)->select('id')->get();
  //   //  dd($customer_id);
  //    for($count = 0; $count < $maxcount ; $count++)
  //    {
  //       $c_id= (count($customer_id)>$count) ? $customer_id[$count]->id : 0;
  //       $databases = customer_vehicles::updateOrCreate(
  //         ['id'=>$c_id, 'customer_id'=>auth()->user()->id],
  //         ['customer_id' =>$customer_id,
  //         'v_no' =>   $customer_vehicle['v_no'][$count],
  //         'distance'  => $customer_vehicle['distance'][$count],
  //         'preinfo'  =>  $info,
  //         'delivery'  => $customer_vehicle['delivery'][$count],
  //         'v_remarks'  => $customer_vehicle['v_remarks'][$count],
  //         'v_status' => $customer_vehicle['v_status'][$count],
  //         'booked_at'  => \Carbon\Carbon::now()->toDateTimeString()
  //         ]
  //     );
  //   }

  //   $records = DB::table('customer_vehicles')
  // ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
  // ->where('customer_vehicles.customer_id',auth()->user()->id)
  // ->select('customer_vehicles.*','users.frst_name','users.last_name','users.mobile_no','users.address')
  // ->get();

  //   return $this->sendResponse($records, 'Personal Data Updated successfully.');
    
  // }

    public function book_old_store(Request $request,$id)
{

  $records = DB::table('customer_vehicles')
  ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
  ->where('customer_vehicles.id',$id)
  ->select('customer_vehicles.*','users.frst_name','users.last_name','users.mobile_no','users.address')
  ->get();

  //while one table isnt necessary to be updated we can discard it.
 
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
      'book_delivery'  => $request->get('delivery'),
      'book_distance' => $request->get('distance'),
      'book_v_remarks'  => $cust->v_remarks,
      'book_v_status' => $cust->v_status,
      'book_work_status'  => $cust->work_status
      ]
  );
}


$booked = DB::table('book_customer_vehicles')->where('book_customer_id',$customer_id->id)->get();
// $booked = DB::table('book_customer_vehicles')
// ->join('users', 'book_customer_vehicle.book_customer_id', '=', 'book_customer.id')
// ->where('book_customer_id',$customer_id->id)
// ->select('book_customer_vehicles.*','book_customer.frst_name','book_customer.last_name','book_customer.mobile_no','book_customer.address')
// ->get();
//     $args = http_build_query(array(
//       'token' => config('sms.token'),
//       'from'  => config('sms.from'),
//       'to'    =>  $customer_id->mobile_no,
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
