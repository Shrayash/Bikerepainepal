<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_activities extends Model
{
    protected $table='service_activities';
    public $fillable =['vehicle_slug','work_status'];
    public $primaryKey = 'id';
    public $timestamps = true;

    public function service_vehicle()
    {
    return $this->belongsTo('App\customer_vehicles','vehicle_slug');
    }
}
