<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table='inventories';
    public $fillable =['item_code','item_name','item_image','category','price'];
    public $primaryKey = 'id';
    public $timestamps = true;

    public function category()
    {
    return $this->belongsTo('App\category','category_id');
    }

    public function order()
    {
    return $this->hasMany('App\Order','id');
    }
}
