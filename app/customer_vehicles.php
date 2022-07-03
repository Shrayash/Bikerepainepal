<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_vehicles extends Model
{
    // use HasFactory;
    protected $table='customer_vehicles';
    public $fillable =['vehicle_id','work_status'];
    public $primaryKey = 'id';
    public $timestamps = true;
    // public function user()
    // {
    // return $this->belongsTo('App\User','user_id');
    // }
    public function customer_vehicle()
    {
    return $this->belongsTo('App\customer','customer_id');
    }

    public function v_service()
    {
    return $this->hasMany('App\service_activities','vehicle_id');
    }

    public function v_record()
    {
    return $this->hasMany('App\service_record','vehicle_id');
    }

}
