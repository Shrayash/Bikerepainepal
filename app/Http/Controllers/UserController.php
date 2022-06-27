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

class UserController extends Controller
{
      /**
     * Create a new controller instance.
     *
    //  * @return void

    //  */
    public function AuthRouteAPI(Request $request){
        return $request->user();
     }
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //     // try{
    //     $users =User::orderBy('created_at','DESC')->paginate(5);
    //     $roles =  DB::table('roles')->get();
    // // } catch(\Exception $exception) { 
    // //     throw new NotFoundException();
    // //   }
    //     return view('admin.manageusers')->with('users',$users)->with('roles',$roles);
    return view('customer.register_cust');
    }

    // public function register()
    // {
    //     return view('customer.register_cust');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {

        $validated = $request->validate([
            'activeness' => 'required',
            'usertype' => 'required',
        ]);
        $user = User::findOrfail($id);
        $userstat = $user->status;
        $user->status = $request->get('activeness');
        $user->update();
        $current_stat=(int)$user->status;
        if($userstat === $current_stat){
        }else{
            
        }
        
        $model = DB::table('model_has_roles')->where('model_id', '=', $id)->get();
         if ($model === null) {
                $user->assignRole($request->get('usertype'));
                // Notification::send($user, new RolesChange($user));
            } else {
                $previous_roles=$user->getRoleNames();
                $previous_role=$previous_roles->get(0);
                $current_role=$request->get('usertype');
                if($previous_role===$current_role){}else{
                $user->syncRoles($current_role);
                    // Notification::send($user, new RolesChange($user));    
            }
        }
    
        return redirect()->route('admin.manageusers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // try{
        $user = User::find($id);
        $user->delete();
        if($user){
            return redirect()->route('admin.manageusers')->with(['message'=> 'User Removed Sucessfully']);
            }
            else{
                return redirect()->route('admin.manageusers')->with(['error'=> 'Error while deleting the user!!']);
            }

    }
}
