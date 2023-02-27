<?php

namespace App\Http\Controllers;

use App\User;
use App\videos;
use App\Inventory;
use App\category;
use App\Order;
use App\Order_Status;
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
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $slug)
    {
        $inventory = Inventory::where('slug',$slug)->get();
        $customer = User::findOrfail(auth()->user()->id);
        $quantity = $request->get('quantity');
        $total_price = $quantity * $inventory[0]->price;
        // dd($customer->mobile_no);
        // $inventory = Inventory::all();
        // $category = category::all();
        // $item_code =  Helper::IDGenerator(new Inventory, 'item_code', 4, 'BRN');
        return view('order.order_confirm')->with('inventory',$inventory)->with('customer',$customer)->with('quantity',$quantity)->with('total_price',$total_price);
    }

    public function store(Request $request){
    // { $values = array(
    //         'item_name' => 'required|unique:inventories,item_name',
    //         'file' => 'required|unique:inventories,file'
    //       );
    //       $error = Validator::make($request->all(), $values);
    //       if($error->fails())
    //       {
    //         // return Redirect::to('register')->withErrors($error);
    //       return response()->json([
    //         'error'  => $error->errors()->all()
    //       ]);
    //       }
        $order = new Order();
        $order->item_id=$request->get('item_id');
        $order->slug = Str::slug($order->item_id);
        $order->customer_id=auth()->user()->id;
        $order->quantity=$request->get('quantity');
        $order->total_price=$request->get('total_price');
        $order->status_id="1";
        $order->save();
        return redirect()->route('order.show');
        // $record = DB::table('order_items')
        //         ->join('inventories', 'order_items.item_id', '=', 'inventories.id')
        //         ->join('users', 'order_items.customer_id', '=', 'users.id')
        //         ->where('users.id', '=', auth()->user()->id)
        //         ->get();
       
        // $message="Thank you for placing your order! Our team will contact you soon for further process.";
        // return view('order.order_done')->with('record',$record)->with('message',$message);
    }

    public function show(){

        $pending = DB::table('order_items')
               ->join('inventories', 'order_items.item_id', '=', 'inventories.id')
                ->join('users', 'order_items.customer_id', '=', 'users.id')
                ->where('users.id', '=', auth()->user()->id)
                ->where('order_items.status_id', '=', '1')
                ->select('order_items.quantity','order_items.total_price','order_items.created_at','inventories.item_code','inventories.item_name','inventories.price','inventories.file')
                ->latest()->get();
         $completed = DB::table('order_items')
                ->join('inventories', 'order_items.item_id', '=', 'inventories.id')
                 ->join('users', 'order_items.customer_id', '=', 'users.id')
                 ->where('users.id', '=', auth()->user()->id)
                 ->where('order_items.status_id', '=', '2')
                 ->select('order_items.quantity','order_items.total_price','order_items.created_at','inventories.item_code','inventories.item_name','inventories.price','inventories.file')
                 ->latest()->get();
        $cancelled = DB::table('order_items')
                 ->join('inventories', 'order_items.item_id', '=', 'inventories.id')
                  ->join('users', 'order_items.customer_id', '=', 'users.id')
                  ->where('users.id', '=', auth()->user()->id)
                  ->where('order_items.status_id', '=', '3')
                  ->select('order_items.quantity','order_items.total_price','order_items.created_at','inventories.item_code','inventories.item_name','inventories.price','inventories.file')
                  ->latest()->get();
        
                
       
       $message="Thank you for placing your order! Our team will contact you soon for further process.";
        return view('order.order_done')->with('pending',$pending)->with('completed',$completed)->with('cancelled',$cancelled)->with('message',$message);
    }



    public function showall(){
        $pending_count=Order::where('status_id','1')->count();
        $completed_count=Order::where('status_id','2')->count();
        $cancelled_count=Order::where('status_id','3')->count();
        $order_status = Order_Status::all();
        $record = DB::table('order_items')
               ->join('inventories', 'order_items.item_id', '=', 'inventories.id')
                ->join('users', 'order_items.customer_id', '=', 'users.id')
                ->select('order_items.id','order_items.quantity','order_items.status_id','order_items.total_price','order_items.created_at','inventories.item_code','inventories.item_name','inventories.price','inventories.file','users.frst_name','users.mobile_no')
                ->latest()->get();

        return view('order.order_show')->with('pending_count',$pending_count)->with('completed_count',$completed_count)->with('cancelled_count',$cancelled_count)->with('record',$record);
    }

    public function order_admin_edit($id){
    

        $record = DB::table('order_items')
               ->join('inventories', 'order_items.item_id', '=', 'inventories.id')
                ->join('users', 'order_items.customer_id', '=', 'users.id')
                ->where('order_items.id',$id)
                ->select('order_items.id','order_items.quantity','order_items.status_id','order_items.customer_id','order_items.total_price','order_items.created_at','inventories.item_code','inventories.item_name','inventories.description','inventories.price','inventories.file','users.frst_name','users.last_name','users.address','users.mobile_no')
                ->get();
        $order_status = Order_Status::all();
        return view('order.order_details')->with('record',$record)->with('order_status',$order_status);
    }

    public function order_admin_update(Request $request,$id){

        $order = Order::findOrfail($id);
        // $order->item_id=$request->get('item_id');
        // $order->slug = Str::slug($order->item_id);
        // $order->customer_id=$request->get('user_id');
        $order->quantity=$request->get('quantity');
        $total_price = $order->quantity * $request->get('price');
        $order->total_price=$total_price;
        $order->status_id=$request->get('status_id');
        $order->save();
        return redirect()->route('order.showall');
        // return redirect()->route('orderadmin.edit',$id);
    }

}
