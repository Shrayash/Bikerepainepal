<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use DB;
use App\User;
use App\book_customer;
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

 

  public function book_store(Request $request)
  {
    // $trial=\Carbon\Carbon::createFromFormat('Y-m-d\TH:i',$request->get('date'));

    $book_customer=[];
    $book_customer_vehicle = [];
 
    $book_customer['frst_name'] = $request->get('frst_name');
    $book_customer['last_name'] = $request->get('last_name');
    $book_customer['mobile_no'] = $request->get('mobile_no');
    $book_customer['address'] = $request->get('address');
    $book_customer['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
    $book_customer['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
   
    $id = DB::table('book_customer')->insertGetId($book_customer);
    
   $book_customer_vehicle['v_no'] = $request->get('v_no');
   $book_customer_vehicle['date'] = $request->get('date');
   $book_customer_vehicle['delivery'] = $request->get('delivery');
   $book_customer_vehicle['v_remarks'] = $request->get('v_remarks');
  
  
     $maxcount=count( $book_customer_vehicle['v_no']);
    for($count = 0; $count < $maxcount ; $count++)
    {
        
     $data = array(
      'book_customer_id' => $id,
      'book_v_no' =>   $book_customer_vehicle['v_no'][$count],
      'book_date'  => $book_customer_vehicle['date'][$count],
      'book_delivery'  => $book_customer_vehicle['delivery'][$count],
      'book_v_remarks'  => $book_customer_vehicle['v_remarks'][$count]
  
     );
     $insert_data[] = $data; 
    }
    book_customer_vehicle::insert($insert_data);

    //API SMS

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
