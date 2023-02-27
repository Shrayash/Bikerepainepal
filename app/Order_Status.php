<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Status extends Model
{
    protected $table='order_status';
    public $fillable =['status'];
    public $primaryKey = 'id';
    public $timestamps = true;

    public function order_status()
    {
    return $this->hasMany('App\Order','id');
    }
}
