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
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;



class CustomerController extends Controller
{
    //
    private $main_id;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    return view('customer.register_cust');
    }



    public function store(Request $request)
    {
 
           $customer=[];
           $customer_vehicle = [];
        
             
           $customer['frst_name'] = $request->get('frst_name');
           $customer['last_name'] = $request->get('last_name');
           $customer['mobile_no'] = $request->get('mobile_no');
           $customer['address'] = $request->get('address');
           $customer['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
           $customer['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
          
           $id = DB::table('customer')->insertGetId($customer);
           
       
          $customer_vehicle['v_no'] = $request->get('v_no');
          $customer_vehicle['distance'] = $request->get('distance');
          $customer_vehicle['delivery'] = $request->get('delivery');
          $customer_vehicle['v_remarks'] = $request->get('v_remarks');
         
         
            $maxcount=count( $customer_vehicle['v_no']);
           for($count = 0; $count < $maxcount ; $count++)
           {
               
            $data = array(
             'customer_id' => $id,
             'v_no' =>   $customer_vehicle['v_no'][$count],
             'distance'  => $customer_vehicle['distance'][$count],
             'delivery'  => $customer_vehicle['delivery'][$count],
             'v_remarks'  => $customer_vehicle['v_remarks'][$count]
         
            );
            $insert_data[] = $data; 
           }
           customer_vehicles::insert($insert_data);

           return response()->json([
            'success'  => 'Data Added successfully.','id'=>$id
           ]);
           
        //    return view('admin.index');
            // return redirect()->route('customer.show', ['id' => $id]);
            
        //    return redirect('/customer/show/'.$id);
           
        //    return $this->show($id);
   
       
        }

        public function show($id)
        {
                $customer = customer::where('id','=',$id)->get();
                $customer_vehicle = DB::table('customer_vehicles')->where('customer_vehicles.customer_id','=',$id)->where('customer_vehicles.v_status','=','active')->get()->toArray();
                return view('customer.detail_cust')->with('id',$id)->with('customer',$customer)->with('customer_vehicle',$customer_vehicle);
            
        }

        public function edit($id)
    {
      // dd('here');
        $customer_vehicle = [];
        $customer = customer::find($id);
        $customer_vehicle = DB::table('customer_vehicles')->where('customer_vehicles.customer_id','=',$id)->get();
        // return view('admin.adminhome');
        return view('customer.edit',['customer'=>$customer,'customer_vehicle'=>$customer_vehicle,'id'=>$id]);
      
    }

    public function check(Request $request)
    {
        return view('customer.search_cust');
      
    }

    public function update(Request $request, $id)
    {
   
    $customer=[];
    $customer_vehicle = [];
  
    $customer['frst_name'] = $request->get('frst_name');
    $customer['last_name'] = $request->get('last_name');
    $customer['mobile_no'] = $request->get('mobile_no');
    $customer['address'] = $request->get('address');
    $customer['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
    $customer['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
   
    DB::table('customer')->where('id',$id)->update($customer);

    $customer_vehicle['v_no'] = $request->get('v_no');
    $customer_vehicle['distance'] = $request->get('distance');
    $customer_vehicle['delivery'] = $request->get('delivery');
    $customer_vehicle['v_remarks'] = $request->get('v_remarks');
    $customer_vehicle['v_status'] = $request->get('v_status');
    dd($customer_vehicle['v_status']);
   
      $maxcount=count( $customer_vehicle['v_no']);
      $customer_id = DB::table('customer_vehicles')->where('customer_id',$id)->select('id')->get();
     
     for($count = 0; $count < $maxcount ; $count++)
     {

        $c_id= (count($customer_id)>$count) ? $customer_id[$count]->id : 0;
        $databases = customer_vehicles::updateOrCreate(
          ['id'=>$c_id, 'customer_id'=>$id],
          ['customer_id' => $id,
          'v_no' =>   $customer_vehicle['v_no'][$count],
          'distance'  => $customer_vehicle['distance'][$count],
          'delivery'  => $customer_vehicle['delivery'][$count],
          'v_remarks'  => $customer_vehicle['v_remarks'][$count],
          'v_status' => $customer_vehicle['v_status'][$count]
          ]
      );
      dd('hasdere');
         
      return response()->json([
        'success'  => 'Data Updated successfully.'
        ]);
    }
  }

  public function search(Request $request)
  {
  //   $customer_query = $request->get('customer_query');
  //   dd( $customer_query);
  //  if($request->ajax())
  //  {
  //   if($customer_query != '')
  //   {
  //     // $doc= User::where('status',1)->where('name', 'like', '%'.$search_query.'%')->get();
  //     $data= customer::where('mobile_no', 'like', '%'.$customer_query.'%')->get();
  //     dd($data);
      
  //   }
  //   else
  //   {
  //     $data='Nothing to display';
  //     // $doc ='Nothing to display';
  //   }

  //   // return response()->json(array('data'=>$data,'doc'=>$doc));
  //   return response()->json(array('data'=>$data));
  //  }else{
  //   // $data='Nothing to display';
  //   // return response()->json(array('data'=>$data));
    
  //   dd('here');
  //  }
  if($request->ajax())
  {
   $output = '';
   $query = $request->get('query');
   if($query != '')
   {
    $data = DB::table('customer')
      ->where('mobile_no', 'like', '%'.$query.'%')
      ->orWhere('frst_name', 'like', '%'.$query.'%')
      ->get();
      
   }
   else
   {
    $data = DB::table('customer')
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
      <td>'.'<a href="/customer/show/'.$row->id.'"><button type="button" class="btn btn-success btn-fw">Manage Service</button</a></td>
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
}
