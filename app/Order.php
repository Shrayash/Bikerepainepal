<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='order_items';
    public $fillable =['quantity','total_price'];
    public $primaryKey = 'id';
    public $timestamps = true;

    public function order()
    {
    return $this->belongsTo('App\Inventory','item_id');
    }

    public function customer_order()
    {
    return $this->belongsTo('App\User','customer_id');
    }
    public function order_status()
    {
    return $this->belongsTo('App\Order','status_id');
    }
}
