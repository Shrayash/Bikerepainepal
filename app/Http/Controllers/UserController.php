<?php

namespace App\Http\Controllers;
use App\User;
use App\videos;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\StatusChange;
use App\Notifications\RolesChange;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Validator;
use App\customer_vehicles;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    //   /**
    //  * Create a new controller instance.
    //  *
    // //  * @return void

    // //  */
    // public function AuthRouteAPI(Request $request){
    //     return $request->user();
    //  }
  
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    // //     // try{
    // //     $users =User::orderBy('created_at','DESC')->paginate(5);
    // //     $roles =  DB::table('roles')->get();
    // // // } catch(\Exception $exception) { 
    // // //     throw new NotFoundException();
    // // //   }
    // //     return view('admin.manageusers')->with('users',$users)->with('roles',$roles);
    // return view('customer.register_cust');
    // }

    // // public function register()
    // // {
    // //     return view('customer.register_cust');
    // // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request,$id)
    // {

    //     $validated = $request->validate([
    //         'activeness' => 'required',
    //         'usertype' => 'required',
    //     ]);
    //     $user = User::findOrfail($id);
    //     $userstat = $user->status;
    //     $user->status = $request->get('activeness');
    //     $user->update();
    //     $current_stat=(int)$user->status;
    //     if($userstat === $current_stat){
    //     }else{
            
    //     }
        
    //     $model = DB::table('model_has_roles')->where('model_id', '=', $id)->get();
    //      if ($model === null) {
    //             $user->assignRole($request->get('usertype'));
    //             // Notification::send($user, new RolesChange($user));
    //         } else {
    //             $previous_roles=$user->getRoleNames();
    //             $previous_role=$previous_roles->get(0);
    //             $current_role=$request->get('usertype');
    //             if($previous_role===$current_role){}else{
    //             $user->syncRoles($current_role);
    //                 // Notification::send($user, new RolesChange($user));    
    //         }
    //     }
    
    //     return redirect()->route('admin.manageusers');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
 

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     // try{
    //     $user = User::find($id);
    //     $user->delete();
    //     if($user){
    //         return redirect()->route('admin.manageusers')->with(['message'=> 'User Removed Sucessfully']);
    //         }
    //         else{
    //             return redirect()->route('admin.manageusers')->with(['error'=> 'Error while deleting the user!!']);
    //         }

    // }
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
          $values = array(
            'mobile_no' => 'required|unique:users,mobile_no|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'v_no' => 'required',
            'v_remarks' => 'required'
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
           $customer_vehicle = [];
        
             
           $customer['frst_name'] = $request->get('frst_name');
           $customer['last_name'] = $request->get('last_name');
           $customer['mobile_no'] = $request->get('mobile_no');
           $customer['address'] = $request->get('address');
           $customer['password'] = Hash::make('test123!');
          //  $customer['id'] = Str::id($request->get('frst_name'));
           $customer['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
           $customer['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
          
           $id = DB::table('users')->insertGetId($customer);
           
       
          $customer_vehicle['v_no'] = $request->get('v_no');
          $customer_vehicle['distance'] = $request->get('distance');
          $customer_vehicle['delivery'] = $request->get('delivery');
          $customer_vehicle['v_remarks'] = $request->get('v_remarks');
          $info='reg';
         
         
            $maxcount=count( $customer_vehicle['v_no']);
           for($count = 0; $count < $maxcount ; $count++)
           {
               
            $data = array(
             'customer_id' =>  $id,
             'v_no' =>   $customer_vehicle['v_no'][$count],
             'distance'  => $customer_vehicle['distance'][$count],
             'preinfo'  =>  $info,
             'delivery'  => $customer_vehicle['delivery'][$count],
             'v_remarks'  => $customer_vehicle['v_remarks'][$count],
             'booked_at'  => \Carbon\Carbon::now()->toDateTimeString()
            );
            $insert_data[] = $data; 
           }
           customer_vehicles::insert($insert_data);
           $user = User::findOrFail( $id);
           $user->assignRole('admin');
        //    $roles = DB::table('model_has_roles')->insert([
        //     [
        //         'role_id'=>1 ,
        //         'model_type'=>'App\User',
        //         'model_id'=>$id
        //     ]
        // ]);

//            $args = http_build_query(array(
//             'token' => config('sms.token'),
//             'from'  => config('sms.from'),
//             'to'    => $request->get('mobile_no'),
//             'text'  => 'Dear Customer,
// You have been successfully registered as our user. Your User-ID is '.$request->get('mobile_no').'
// Warm Regards,
// Bike Repairs Nepal'));

      
        
      
//           # Make the call using API.
//           $ch = curl_init();
//           curl_setopt($ch, CURLOPT_URL, config('sms.url'));
//           curl_setopt($ch, CURLOPT_POST, 1);
//           curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
//           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      
//         // Response
//           $response = curl_exec($ch);
//           $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//           curl_close($ch);

          // $days = 1;
          // $dir = dirname ( \storage\app\public\images );

          // $nofiles = 0;

          //     if ($handle = opendir($dir)) {
          //     while (( $file = readdir($handle)) !== false ) {
          //         if ( $file == '.' || $file == '..' || is_dir($dir.'/'.$file) ) {
          //             continue;
          //         }

          //         if ((time() - filemtime($dir.'/'.$file)) > ($days *86400)) {
          //             $nofiles++;
          //             unlink($dir.'/'.$file);
          //         }
          //     }
          //     closedir($handle);

           return response()->json([
            'success'  => 'Data Added successfully.','id'=>$id
           ]);
          
   
       
        }

        public function show($id)
        {
                $customer = User::where('id',$id)->get();
                $customer_vehicle = DB::table('customer_vehicles')->where('customer_vehicles.customer_id','=',$id)->where('customer_vehicles.v_status','=','active')->get()->toArray();
                $resolved = DB::table('service_record')
                ->join('customer_vehicles', 'service_record.vehicle_id', '=', 'customer_vehicles.id')
                ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
                ->where('users.id', '=', $id)
                ->select('service_record.*','customer_vehicles.v_no','customer_vehicles.delivery')
                ->latest()->get();

                return view('customer.detail_cust')->with('id',$id)->with('customer',$customer)->with('customer_vehicle',$customer_vehicle)->with('resolved',$resolved);
            
        }

        public function edit($id)
    {
      // dd('here');
        $customer_vehicle = [];
        $customer = User::findOrfail($id);
        $customer_vehicle = DB::table('customer_vehicles')->where('customer_vehicles.customer_id','=',$id)->get();
        return view('customer.edit',['customer'=>$customer,'customer_vehicle'=>$customer_vehicle,'id'=>$id]);
      
    }

    public function check(Request $request)
    {
        return view('customer.search_cust');
      
    }

  //   public function update_user(Request $request, $id)
  //   {
   
  //   $customer=[];
  //   $customer_vehicle = [];
  
  //   $customer['frst_name'] = $request->get('frst_name');
  //   $customer['last_name'] = $request->get('last_name');
  //   $customer['mobile_no'] = $request->get('mobile_no');
  //   $customer['address'] = $request->get('address');
  //   $customer['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
  //   $customer['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
   
  //   DB::table('users')->where('id',$id)->update($customer);

  //     return response()->json([
  //       'success'  => 'Data Updated successfully.','id'=>$id
  //       ]);
    
  // }

  // public function update_vehicle(Request $request, $id)
  //   {

  //     $vehicle = DB::table('customer_vehicles')->where('id',$id)->get();
   
  //   $customer_vehicle = [];

  //   $customer_vehicle['v_no'] = $request->get('v_no');
  //   $customer_vehicle['distance'] = $request->get('distance');
  //   $customer_vehicle['delivery'] = $request->get('delivery');
  //   $customer_vehicle['v_remarks'] = $request->get('v_remarks');
  //   $customer_vehicle['v_status'] = $request->get('v_status');
  //   $customer_vehicle['preinfo']='reg';
  //   $customer_vehicle['booked_at']= $vehicle->booked_at;
  //   $customer_vehicle['work_status']= $vehicle->work_status;

  //   DB::table('customer_vehicles')->where('id',$id)->update($customer_vehicle);

  //     return response()->json([
  //       'success'  => 'Data Updated successfully.','id'=>$id
  //       ]);
    
  // }

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
   
    DB::table('users')->where('id',$id)->update($customer);

    $customer_vehicle['v_no'] = $request->get('v_no');
    $customer_vehicle['distance'] = $request->get('distance');
    $customer_vehicle['delivery'] = $request->get('delivery');
    $customer_vehicle['v_remarks'] = $request->get('v_remarks');
    $customer_vehicle['v_status'] = $request->get('v_status');
    $info='reg';
   
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
          'preinfo'  =>  $info,
          'delivery'  => $customer_vehicle['delivery'][$count],
          'v_remarks'  => $customer_vehicle['v_remarks'][$count],
          'v_status' => $customer_vehicle['v_status'][$count],
          'booked_at'  => \Carbon\Carbon::now()->toDateTimeString()
          ]
      );
    }

      

      return response()->json([
        'success'  => 'Data Updated successfully.','id'=>$id
        ]);
    
  }

  public function search(Request $request)
  {

  if($request->ajax())
  {
   $output = '';
   $query = $request->get('query');
   if($query != '')
   {
    $data = User::role('admin')
      ->where('mobile_no', 'like', '%'.$query.'%')
      ->orWhere('frst_name', 'like', '%'.$query.'%')
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
