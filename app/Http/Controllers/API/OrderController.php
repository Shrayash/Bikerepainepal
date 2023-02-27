<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use DB;
use App\User;
use App\Order;
use App\customer_vehicles;
use App\book_customer;
use App\service_record;
use App\book_customer_vehicle;
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Booking as Book;
use Illuminate\Support\Facades\Auth;

class OrderController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id)
    {
        $product_details =[];
        $product_details['inventory'] = Inventory::findOrfail($id);
        $product_details['customer'] = User::findOrfail(auth()->user()->id);
        $product_details['quantity'] = $request->get('quantity');
        $product_details['total_price'] = $quantity * $inventory[0]->price;
        return $this->sendResponse($product_details, 'Retrieved product detail success.');
    }

    public function store(Request $request, $id){
    
        $order = new Order();
        $order->item_id=$id;
        $order->slug = Str::slug($order->item_id);
        $order->customer_id=auth()->user()->id;
        $order->quantity=$request->get('quantity');
        $order->total_price=$request->get('total_price');
        $order->status="pending";
        $order->save();
        return $this->sendResponse($product_details, 'Retrieved product detail success.');

        
    }

    public function show(){

        $order_status = [];

        $order_status['pending'] = DB::table('order_items')
               ->join('inventories', 'order_items.item_id', '=', 'inventories.id')
                ->join('users', 'order_items.customer_id', '=', 'users.id')
                ->where('users.id', '=', auth()->user()->id)
                ->where('order_items.status', '=', 'pending')
                ->select('order_items.quantity','order_items.total_price','order_items.created_at','inventories.item_code','inventories.item_name','inventories.price','inventories.file')
                ->latest()->get();
        $order_status['completed'] = DB::table('order_items')
                ->join('inventories', 'order_items.item_id', '=', 'inventories.id')
                 ->join('users', 'order_items.customer_id', '=', 'users.id')
                 ->where('users.id', '=', auth()->user()->id)
                 ->where('order_items.status', '=', 'completed')
                 ->select('order_items.quantity','order_items.total_price','order_items.created_at','inventories.item_code','inventories.item_name','inventories.price','inventories.file')
                 ->latest()->get();
        $order_status['cancelled'] = DB::table('order_items')
                 ->join('inventories', 'order_items.item_id', '=', 'inventories.id')
                  ->join('users', 'order_items.customer_id', '=', 'users.id')
                  ->where('users.id', '=', auth()->user()->id)
                  ->where('order_items.status', '=', 'cancelled')
                  ->select('order_items.quantity','order_items.total_price','order_items.created_at','inventories.item_code','inventories.item_name','inventories.price','inventories.file')
                  ->latest()->get();
        return $this->sendResponse($order_status, 'Retrieved product detail success.');
    }


}
