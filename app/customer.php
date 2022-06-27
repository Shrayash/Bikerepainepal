<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    // use HasFactory;
    protected $table='customer';
    public $primaryKey = 'id';
    public $timestamps = true;
    public function customer()
    {
    return $this->hasMany('App\customer_vehicles','customer_id');
    }

   
}
