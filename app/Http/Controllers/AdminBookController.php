<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use DB;
use App\User;
use App\customer;
use App\customer_vehicles;
use App\book_customer;
use App\book_customer_vehicle;
use App\roles;
use App\model_has_roles;
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class AdminBookController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(Request $request)
    {
        $services = DB::table('book_customer_vehicles')
        ->join('users', 'book_customer_vehicles.book_customer_id', '=', 'users.id')
        ->select('book_customer_vehicles.*','users.frst_name','users.last_name','users.mobile_no')
        ->get();
        
        return view('service.booking.show')->with('services', $services);
    }

    public function show_book(Request $request)
    {

        $services = DB::table('customer_vehicles')
        ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
        ->where('customer_vehicles.preinfo', '=', 'book')
        ->select('customer_vehicles.*', 'users.id','users.frst_name','users.last_name','users.mobile_no')
        ->get();
        
        return view('service.booking.booked')->with('services', $services);
    }

    public function edit($id)
    {
      
        $book_vehicle = book_customer_vehicle::findOrFail($id);
        $book_customer = User::where('id','=',$book_vehicle->book_customer_id)->get();
        return view('service.booking.update_date',['customers'=> $book_customer,'vehicles'=> $book_vehicle]);
    }

    public function book_old_store(Request $request,$id)
  {
    // dd('here');
    $records = DB::table('customer_vehicles')
    ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
    ->where('customer_vehicles.id',$id)
    ->select('customer_vehicles.*','users.frst_name','users.last_name','users.mobile_no','users.address')
    ->get();

    foreach ($records as $cust) {

      $customer_id = DB::table('users')->where('mobile_no',$cust->mobile_no)->first();
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
  $booked = DB::table('book_customer_vehicles')->where('book_customer_id', $customer_id->id)->get();
  $customer = User::findOrfail( $customer_id->id);
    $args = http_build_query(array(
      'token' => config('sms.token'),
      'from'  => config('sms.from'),
      'to'    =>  $customer->mobile_no,
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

    // return response()->json([
    //  'success'  => 'Data Added successfully.', 'id'=>$id
    // ]);
    
    return redirect()->route('book.request');
  }


  //If booking Request 'Yes' then this 
    public function update_book($id)
    {
        $book_vehicle = book_customer_vehicle::findOrFail($id);
        $customer_id=$book_vehicle->book_customer_id;
        //if condn in distance if exist same else 0
          $info='book';
          $database_customer_vehicle = customer_vehicles::updateOrCreate(
            ['customer_id'=>$customer_id,'v_no'=>$book_vehicle->book_v_no],
            ['customer_id' => $customer_id,
            'v_no' => $book_vehicle->book_v_no,
            'distance'  => $book_vehicle->book_distance,
            'delivery'  => $book_vehicle->book_delivery,
            'v_remarks'  => $book_vehicle->book_v_remarks,
            'preinfo'  =>  $info,
            'v_status' => $book_vehicle->book_v_status,
            'work_status'  => $book_vehicle->book_work_status,
            'booked_at' => $book_vehicle->book_date
            ]
        );

        
      //if one delete user else if many only vehicle IMPORTANT CHANGE LATER NO DELTE STATUS KEEP IN BOOKING TABLE PENDING/BOOKED
      $del_vehicle = book_customer_vehicle::where('id','=',$id)->delete();
      // $count=book_customer_vehicle::where('book_customer_id','=',$book_vehicle->book_customer_id)->count();
      // if($count > 1){
      //   $del_vehicle = book_customer_vehicle::where('id','=',$id)->delete();
      // } else{
      //   $book_customer = book_customer::where('id','=',$book_vehicle->book_customer_id)->delete();
      // }
      
      $customer = User::findOrfail( $customer_id);
        $args = http_build_query(array(
          'token' => config('sms.token'),
          'from'  => config('sms.from'),
          'to'    => $customer->mobile_no,
          'text'  => 'Dear Customer,
Your booking has been confirmed for '.$book_vehicle->book_date.'.
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
        
      
        return redirect()->route('customer.show',$customer_id);
    
  }


//If booking Request 'No' date updated then this 
  public function update_to_vehicles(Request $request,$id)
    {
  
    $book_vehicle = book_customer_vehicle::findOrFail($id);
    $customer_id=$book_vehicle->book_customer_id;
    $info='book';
    
//  $distance='0';
 $info='book';
 $date=$request->get('book_date');
//   dd( $date->toDateTimeString());
      $database_customer_vehicle = customer_vehicles::updateOrCreate(
        ['customer_id'=>$customer_id,'v_no'=>$book_vehicle->book_v_no],
        ['customer_id' => $customer_id,
        'v_no' => $book_vehicle->book_v_no,
        'distance'  => $book_vehicle->book_distance,
        'delivery'  => $book_vehicle->book_delivery,
        'v_remarks'  => $book_vehicle->book_v_remarks,
        'preinfo'  => $info,
        'v_status' => $book_vehicle->book_v_status,
        'work_status'  => $book_vehicle->book_work_status,
        'booked_at' => $date
    
        ]
    );

    $del_vehicle = book_customer_vehicle::where('id','=',$id)->delete();
    // $count=book_customer_vehicle::where('book_customer_id','=',$book_vehicle->book_customer_id)->count();
    // if($count > 1){
    //   $del_vehicle = book_customer_vehicle::where('id','=',$id)->delete();
    // } else{
    //   $book_customer = book_customer::where('id','=',$book_vehicle->book_customer_id)->delete();
    // }

// $mobile= DB::table('users')->where('id',$customer_id)->select('mobile_no')->get();
$customer = User::findOrfail( $customer_id);
    $args = http_build_query(array(
      'token' => config('sms.token'),
      'from'  => config('sms.from'),
      'to'    => $customer->mobile_no,
      'text'  => 'Dear Customer,
Your booking has been confirmed for '.$date.'.
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
    
    
  
    return redirect()->route('customer.show',$customer_id);
  

  }

  public function check(Request $request)
    {
      $data = DB::table('customer_vehicles')
      ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
      ->where('customer_vehicles.preinfo', '=', 'book')
      ->select('customer_vehicles.*','users.frst_name','users.last_name','users.mobile_no')
      ->get();
        return view('service.booking.booked',['data'=>$data]);
      
    }

    public function check_oldmobile()
  {
  return view('service.booking.old_search');
  }

    public function oldmobile(Request $request)
  {
    if($request->ajax())
    {
     $output = '';
     $query = $request->get('query');
     if($query != '')
     {
      $data = User::role('admin')
        ->where('mobile_no', 'like', '%'.$query.'%')
        ->get();
        
     }
     else
     {
        $data = User::role('admin')
        ->orderBy('id', 'desc')
        ->get();
     }
     $total_row = $data->count();
     if($total_row > 0)
     {
      foreach($data as $row)
      {
       $output .= '
       <tr>
        <td>'.$row->frst_name.'</td>
        <td>'.$row->last_name.'</td>
        <td>'.$row->mobile_no.'</td>
        <td>'.'<a href="/customer/oldbook/'.$row->id.'"><button type="button" class="btn btn-success btn-fw">Booking Settings</button</a></td>
       </tr>
       ';
      }
     }
     else
     {
      $output = '
      <tr>
       <td align="center" colspan="5">No Data Found</td>
      </tr>
      ';
     }
     $data = array(
      'table_data'  => $output,
      'total_data'  => $total_row
     );
  
     echo json_encode($data);
    }
  }

    public function oldbook($id)
    {
    $customer = User::findOrFail($id);
    $customer_vehicle=customer_vehicles::where('customer_id','=',$customer->id)->get();
    return view('service.booking.old_book',['customer'=>$customer,'customer_vehicle'=>$customer_vehicle]);
    }

  public function search(Request $request)
  {

    // $services = DB::table('customer_vehicles')
    // ->join('customer', 'customer_vehicles.customer_id', '=', 'customer.id')
    // ->where('customer.mobile_no', 'like', '%'.$query.'%')
    // ->select('customer_vehicles.*', 'customer.id','customer.frst_name','customer.last_name','customer.mobile_no')
    // ->get();
    // $services = DB::table('customer_vehicles')
    // ->join('customer', 'customer_vehicles.customer_id', '=', 'customer.id')
    // ->where('customer_vehicles.preinfo', '=', 'book')
    // ->select('customer_vehicles.*', 'customer.id','customer.frst_name','customer.last_name','customer.mobile_no')
    // ->get();
    

  if($request->ajax())
  {
   $output = '';
   $query = $request->get('query');
   if($query != '')
   {
    // $data = User::role('admin')
    //     ->where('mobile_no', 'like', '%'.$query.'%')
    //     ->get();
    $data = DB::table('customer_vehicles')
    ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
    ->where('customer_vehicles.preinfo', '=', 'book')
    ->select('customer_vehicles.*', 'users.id','users.frst_name','users.last_name','users.mobile_no')
    ->where('users.mobile_no', 'like', '%'.$query.'%')
    ->get();
   }
   else
   {
    // $data = User::role('admin')
    //     ->orderBy('id', 'desc')
    //     ->get();
    $data = DB::table('customer_vehicles')
    ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
    ->where('customer_vehicles.preinfo', '=', 'book')
    ->select('customer_vehicles.*', 'users.id','users.frst_name','users.last_name','users.mobile_no')
    ->get();
   }
   $total_row = $data->count();
   if($total_row > 0)
   {
    foreach($data as $row)
    {
      $date_array = explode("T", $row->booked_at);
      // dd($date_array);
     $output .= '
     <tr>
      <td>'.$row->frst_name.'</td>
      <td>'.$row->v_no.'</td>
      <td>'.$row->mobile_no.'</td>
      <td>'. $date_array[0].'</td>
      <td>'. $date_array[1].'</td>
      
      <td>'.'<a href="/customer/service/update/'.$row->id.'"><button name="work_status"  class="btn btn-box btn-primary" type="submit" value="ongoing">Start</button></a></td>
      <td>'.'<a href="/customer/service/booking/cancel/'.$row->id.'"><button name="preinfo"  class="btn btn-box btn-danger" onclick="return confirm("Are you sure you want to cancel this booking?")" type="submit" value="idle">Cancel</button></a></td>
      </tr>
     ';
    }
   }
   else
   {
    $output = '
    <tr>
     <td align="center" colspan="5">No Data Found</td>
    </tr>
    ';
   }
   $data = array(
    'table_data'  => $output,
    'total_data'  => $total_row
   );

   echo json_encode($data);
  }
  }

  public function cancel_book(Request $request,$id)
    {
      $idle='idle';
     
      $book_vehicle= book_customer_vehicle::findOrFail($id);
      $customer_update = DB::table('customer_vehicles')->where('v_no',$book_vehicle->book_v_no)->update(['preinfo'=>$idle]);
      $customer = User::findOrFail($book_vehicle->book_customer_id);
      // $vehicle= customer_vehicles::findOrFail($id);
    //   $del_vehicle = book_customer_vehicle::where([
    //     ['book_customer_id', '=', $vehicle->customer_id],
    //     ['book_v_no', '=', $vehicle->v_no]
    // ])->delete();
    $del_vehicle = book_customer_vehicle::where('id',$id)->delete();
      $args = http_build_query(array(
        'token' => config('sms.token'),
        'from'  => config('sms.from'),
        'to'    =>  $customer->mobile_no,
        'text'  => 'Dear Customer,
Your booking has been canceled for '.$book_vehicle->book_date.'.
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
      return redirect()->route('admin.index');
  

  }
}
