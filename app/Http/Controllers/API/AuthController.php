<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use App\service_record;
use App\customer_vehicles;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use App\Http\Middleware\VerifyCsrfToken ;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        if(Auth::attempt(['mobile_no' => $request->mobile_no, 'password' => $request->password])){ 
            $user = Auth::user(); 
          
            // $success['token'] =  $user->createToken('BikeRepairsNepal')-> accessToken; 
            $success['token'] =  $user->createToken('BikeRepairsNepal')->plainTextToken; 
            
            $success['user_detail']= $user;
            $vehicles=customer_vehicles::where('customer_id',$user->id)->get();
            $success['vehicles']=$vehicles;
            $record= DB::table('service_record')
            ->join('customer_vehicles', 'service_record.vehicle_id', '=', 'customer_vehicles.id')
            ->join('users', 'customer_vehicles.customer_id', '=', 'users.id')
            ->select('service_record.*', 'customer_vehicles.v_no','customer_vehicles.delivery','customer_vehicles.v_remarks','users.frst_name','users.last_name','users.mobile_no')
            ->where('customer_vehicles.customer_id',$user->id)
            ->get();
            $success['resolved_service']=$record;

   
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function logout(Request $request)
    {
        // Auth
        auth()->user()>tokens()->delete();

        return $this->sendResponse($success, 'User logout successfully.');
    }
}
