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
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;

class AdminBookController extends Controller
{

    public function show(Request $request)
    {
        $services = DB::table('book_customer_vehicles')
        ->join('book_customer', 'book_customer_vehicles.book_customer_id', '=', 'book_customer.id')
        ->select('book_customer_vehicles.*', 'book_customer.id','book_customer.frst_name','book_customer.last_name','book_customer.mobile_no')
        ->get();
        
        return view('service.booking.show')->with('services', $services);
    }

    public function edit($id)
    {
        $book_vehicle = book_customer_vehicle::findOrFail($id);
        $book_customer = book_customer::where('id','=',$book_vehicle->book_customer_id)->get();
        return view('service.booking.update_date',['customers'=> $book_customer,'vehicles'=> $book_vehicle]);
    }

    public function update_book($id)
    {
  
        $book_vehicle = book_customer_vehicle::findOrFail($id);
        $book_customer = book_customer::where('id','=',$book_vehicle->book_customer_id)->get();
    
    
        foreach ($book_customer as $cust) {
        $database_customer = customer::updateOrCreate(
              ['frst_name' => $cust->frst_name,'mobile_no'=>$cust->mobile_no],
              ['frst_name' => $cust->frst_name,
              'last_name' => $cust->last_name,
              'mobile_no'  => $cust->mobile_no,
              'address'  => $cust->address,
              'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
              'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
              ]
          );
       
      
          $customer_id = DB::table('customer')->where('mobile_no',$cust->mobile_no)->select('id')->get();
        }
     $distance='0';

          $database_customer_vehicle = customer_vehicles::updateOrCreate(
            ['customer_id'=>$customer_id[0]->id,'v_no'=>$book_vehicle->book_v_no],
            ['customer_id' => $customer_id[0]->id,
            'v_no' => $book_vehicle->book_v_no,
            'distance'  => $distance,
            'delivery'  => $book_vehicle->book_delivery,
            'v_remarks'  => $book_vehicle->book_v_remarks,
            'v_status' => $book_vehicle->book_v_status,
            'work_status'  => $book_vehicle->book_work_status,
            'booked_at' => $book_vehicle->book_date
            ]
        );
    
    
        $book_customer = book_customer::where('id','=',$book_vehicle->book_customer_id)->delete();
        
      
        return redirect()->route('customer.show',$customer_id[0]->id);
    
  }



  public function update_to_vehicles(Request $request,$id)
    {
  
    $book_vehicle = book_customer_vehicle::findOrFail($id);
    $book_customer = book_customer::where('id','=',$book_vehicle->book_customer_id)->get();


    foreach ($book_customer as $cust) {
    $database_customer = customer::updateOrCreate(
          ['frst_name' => $cust->frst_name,'mobile_no'=>$cust->mobile_no],
          ['frst_name' => $cust->frst_name,
          'last_name' => $cust->last_name,
          'mobile_no'  => $cust->mobile_no,
          'address'  => $cust->address,
          'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
          ]
      );
   
  
      $customer_id = DB::table('customer')->where('mobile_no',$cust->mobile_no)->select('id')->get();
    }
 $distance='0';
 $date=$request->get('book_date');
//   dd( $date->toDateTimeString());
      $database_customer_vehicle = customer_vehicles::updateOrCreate(
        ['customer_id'=>$customer_id[0]->id,'v_no'=>$book_vehicle->book_v_no],
        ['customer_id' => $customer_id[0]->id,
        'v_no' => $book_vehicle->book_v_no,
        'distance'  => $distance,
        'delivery'  => $book_vehicle->book_delivery,
        'v_remarks'  => $book_vehicle->book_v_remarks,
        'v_status' => $book_vehicle->book_v_status,
        'work_status'  => $book_vehicle->book_work_status,
        'booked_at' => $date
    
        ]
    );


    $book_customer = book_customer::where('id','=',$book_vehicle->book_customer_id)->delete();
    
  
    return redirect()->route('customer.show',$customer_id[0]->id);
  

  }
}
