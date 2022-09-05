<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_customer_vehicle extends Model
{
    protected $table='book_customer_vehicles';
    public $fillable =['book_work_status','book_delivery','book_distance','book_v_no','book_v_remarks','book_v_status','book_date','book_distance','book_updated_at','book_customer_id'];
    public $primaryKey = 'id';
    public $timestamps = true;
    // public function user()
    // {
    // return $this->belongsTo('App\User','user_id');
    // }
    public function book_customer_vehicle()
    {
    return $this->belongsTo('App\book_customer','book_customer_id');
    }
}
