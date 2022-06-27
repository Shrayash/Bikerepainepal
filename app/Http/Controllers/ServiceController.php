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
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;

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
        // dd($work_status);
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
        // $service_activities=service_activities::all();
        $services = DB::table('service_activities')
            ->join('customer_vehicles', 'service_activities.vehicle_id', '=', 'customer_vehicles.id')
            ->join('customer', 'customer_vehicles.customer_id', '=', 'customer.id')
            ->where('customer_vehicles.v_status','in use')
            ->select('service_activities.*', 'customer_vehicles.v_no', 'customer.mobile_no','customer.frst_name','customer.last_name')
            ->get();



        if($work_status=="ongoing"){
            return view('service.ongoing_service.show')->with('services', $services);
        }else{
            return view('service.ongoing_service.show')->with('services', $services);
        }

  }
}
