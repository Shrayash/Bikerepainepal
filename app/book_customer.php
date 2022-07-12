<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_customer extends Model
{
    protected $table='book_customer';
    public $primaryKey = 'id';
    public $timestamps = true;
    public function book_customer()
    {
    return $this->hasMany('App\book_customer_vehicles','book_customer_id');
    }
}
