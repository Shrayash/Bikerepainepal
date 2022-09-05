<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_record extends Model
{
    protected $table='service_record';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function service_vehicle()
    {
    return $this->belongsTo('App\customer_vehicles','vehicle_id');
    }
}
