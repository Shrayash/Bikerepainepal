<?php

namespace App\Http\Controllers;
use App\User;
use App\model_has_roles;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
                $user = auth()->user();
                if (is_null($user->model_has_roles)) {
                    $value='You have not been verified or assigned any role.';
                    return view('norole')->with('value',$value);
                } else {
                            if ($user->model_has_roles->role_id == 1 or $user->model_has_roles->role_id == 2 ) {
                                return redirect()->route('admin.index');
                            }  else {
                                return redirect()->route('index');
                            }
                        }
           
        
       
    
}
}
