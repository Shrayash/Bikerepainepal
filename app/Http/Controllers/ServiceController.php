<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Validator;
use DB;
use App\User;
use App\customer;
use App\customer_vehicles;
use App\service_activities;
use App\service_record;
use App\book_customer;
use App\book_customer_vehicle;
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
     $ongoing_count=service_activities::where('work_status','ongoing')->count();
     $resolved_count=service_record::count();
     $booking_count=book_customer_vehicle::count();

    
      $ongoings = DB::table('service_activities')
        ->join('customer_vehicles', 'service_activities.vehicle_id', '=', 'customer_vehicles.id')
        ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
        ->where('customer_vehicles.v_status','active')
        ->where('service_activities.work_status','ongoing')
        ->select('service_activities.*', 'customer_vehicles.id','customer_vehicles.customer_id','customer_vehicles.v_no', 'users.id','users.frst_name','users.last_name','users.mobile_no')
        ->take(5)->get();

        $resolved = DB::table('service_record')
        ->join('customer_vehicles', 'service_record.vehicle_id', '=', 'customer_vehicles.id')
        ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
        ->select('service_record.*', 'customer_vehicles.id','customer_vehicles.customer_id','customer_vehicles.v_no', 'users.id','users.frst_name','users.last_name','users.mobile_no')
        ->latest()->take(5)->get();

        $booking=DB::table('book_customer_vehicles')
        ->join('book_customer', 'book_customer_vehicles.book_customer_id', '=', 'book_customer.id')
        ->select('book_customer_vehicles.*','book_customer.id','book_customer.frst_name','book_customer.last_name','book_customer.mobile_no')
        ->latest()->take(5)->get();

        $users = User::findOrfail(auth()->user()->id);

        $records = DB::table('service_record')
        ->join('customer_vehicles', 'service_record.vehicle_id', '=', 'customer_vehicles.id')
        ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
        ->select('service_record.*', 'customer_vehicles.id','customer_vehicles.customer_id','customer_vehicles.v_no', 'users.id','users.frst_name','users.last_name','users.mobile_no')
        ->where('customer_vehicles.customer_id',auth()->user()->id)
        ->get();

      return view('admin.adminhome',['users'=>$users,'records'=>$records,'ongoing_count'=>$ongoing_count,'resolved_count' => $resolved_count,'booking_count' => $booking_count,'ongoings' => $ongoings,'resolved' => $resolved,'bookings' => $booking]);
     
    }

    public function create()
    {
    return view('customer.register_cust');
    }

    public function ongoing(Request $request)
    {
        $services = DB::table('service_activities')
        ->join('customer_vehicles', 'service_activities.vehicle_id', '=', 'customer_vehicles.id')
        ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
        ->where('customer_vehicles.v_status','active')
        ->where('service_activities.work_status','ongoing')
        ->select('service_activities.*', 'customer_vehicles.id','customer_vehicles.customer_id','customer_vehicles.v_no', 'users.id','users.frst_name','users.last_name','users.mobile_no')
        ->get();
        
        return view('service.ongoing_service.show')->with('services', $services);
    }

    public function resolved(Request $request)
    {
        $service_records = DB::table('service_record')
        ->join('customer_vehicles', 'service_record.vehicle_id', '=', 'customer_vehicles.id')
        ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
        ->select('service_record.*', 'customer_vehicles.id','customer_vehicles.customer_id','customer_vehicles.v_no', 'users.id','users.frst_name','users.last_name','users.mobile_no')
        ->latest()->get();

        return view('service.resolved_service.show',['records'=>$service_records]);
    }

    // public function sms_bill($id)
    // {
    //     $record = DB::table('service_record')->where('invoice_no',$id)->get();
    //     return view('service.sms',['records'=>$record]);
    // }

    public function update(Request $request, $id)
    {
        $vehicle = customer_vehicles::findOrfail($id);
        $customer = User::findOrfail( $vehicle->customer_id);
        $work_status = $request->get('work_status');
        $created_at = \Carbon\Carbon::now()->toDateTimeString();
        $updated_at = \Carbon\Carbon::now()->toDateTimeString();
        $databases = service_activities::updateOrCreate(
            [
                'vehicle_id'   => $id,
            ],[
                'vehicle_id'   => $id,
                'work_status' => $work_status,
                'created_at'    => $created_at,
                'updated_at'   => $updated_at
            ]   
        );
        $customer_update = DB::table('customer_vehicles')->where('id',$id)->update(['work_status'=>$work_status]);
        

        $args = http_build_query(array(
            'token' => config('sms.token'),
            'from'  => config('sms.from'),
            'to'    => $customer->mobile_no,
            'text'  => 'Dear Customer,
Your vehicle servicing has been started at '.$created_at.'. Thank you for using our service.
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

        return redirect()->route('service.ongoing');
         
  }


  public function edit($id){
    // dd('here Ism');
    $record = customer_vehicles::findOrFail($id);
    // dd($record);
    $customer = User::where('id','=',$record->customer_id)->get();
    return view('service.resolved_service.update',['records'=>$record,'customers'=>$customer]);
  }

  public function resolve(Request $request, $id){

        $work_status = 'resolve';
        $this->validate($request, [
                'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
            ]);
    
            $record= new service_record();
            $record->vehicle_id = $id;
            $record->invoice_no = $request->get('invoice_no');
            $record->amount = $request->get('amount');
            if($request->hasFile('image')){
   
                $filenamewithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('image')->move('storage/images/',$fileNameToStore);
                }else{
                    $fileNameToStore = 'nofile.jpg';
                }
            $record->file = $fileNameToStore;
            $record->save();

           $idle='idle';

            $created_at = \Carbon\Carbon::now()->toDateTimeString();
            $updated_at = \Carbon\Carbon::now()->toDateTimeString();
            $vehicle = customer_vehicles::findOrfail($id);
            $customer = User::findOrfail( $vehicle->customer_id);
            $databases = service_activities::updateOrCreate(
                [
                    'vehicle_id'   => $id,
                ],[
                    'vehicle_id'   => $id,
                    'work_status' => $work_status,
                    'created_at'    => $created_at,
                    'updated_at'   => $updated_at
                ]   
            );
            $customer_update = DB::table('customer_vehicles')->where('id',$id)->update(['work_status'=>$work_status, 'preinfo' => $idle]);
           
            
           
            $args = http_build_query(array(
                'token' => config('sms.token'),
                'from'  => config('sms.from'),
                'to'    => $customer->mobile_no,
                'text'  => 'Dear Customer,
Your vehicle has been serviced. Your grand total is NRS '.$record->amount.'. For more details of this billing, click this link http://bikerepairsnepal.com.np/customer/bill/'.$record->invoice_no.'.
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

            return redirect()->route('service.resolved');
  }


 
  
}
