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

    public function create()
    {
    return view('customer.register_cust');
    }

    public function update(Request $request, $id)
    {
        // $vehicle = customer_vehicles::findOrfail($id);
        // $customer = customer::findOrfail( $vehicle->customer_id);
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
        if($work_status=="ongoing"){
        $services = DB::table('service_activities')
        ->join('customer_vehicles', 'service_activities.vehicle_id', '=', 'customer_vehicles.id')
        ->join('customer', 'customer_vehicles.customer_id', '=', 'customer.id')
        ->where('customer_vehicles.v_status','active')
        ->select('service_activities.*', 'customer_vehicles.*', 'customer.*')
        ->get();
        
        return view('service.ongoing_service.show')->with('services', $services);
    }else{
             return redirect()->route('service.edit',$id);

        // $record = customer_vehicles::findOrFail($id);
        // $customer = customer::where('id','=',$record->customer_id)->get();
        // dd($customer);
        // return view('service.resolved_service.update');
    }
        
  }

  public function edit($id){
    // dd('here Ism');
    $record = customer_vehicles::findOrFail($id);
    // dd($record);
    $customer = customer::where('id','=',$record->customer_id)->get();
    return view('service.resolved_service.update',['records'=>$record,'customers'=>$customer]);
    

  }

  public function resolve(Request $request, $id){

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
            $service_records = DB::table('service_record')
            ->join('customer_vehicles', 'service_record.vehicle_id', '=', 'customer_vehicles.id')
            ->join('customer', 'customer_vehicles.customer_id', '=', 'customer.id')
            ->select('service_record.*', 'customer_vehicles.id','customer_vehicles.customer_id','customer_vehicles.v_no', 'customer.id','customer.frst_name','customer.last_name','customer.mobile_no')
            ->get();

            return view('service.resolved_service.show',['records'=>$service_records]);
            
  }
}
