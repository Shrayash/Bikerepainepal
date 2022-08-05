<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_customer extends Model
{
    protected $table='book_customer';
    public $fillable =['frst_name','last_name','mobile_no','address','updated_at','book_slug','created_at'];
    public $primaryKey = 'id';
    public $timestamps = true;
    public function book_customer()
    {
    return $this->hasMany('App\book_customer_vehicles','book_customer_slug');
    }
}
