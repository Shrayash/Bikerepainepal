<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    protected $table='videos';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
    return $this->belongsTo('App\User','user_id');
    }

    public function groups()
    {
    return $this->belongsTo('App\group','group');
    }
    
    public function video_contents()
    {
        return $this->hasMany('App\video_contents','parent_id');
    }

    public function category()
    {
        return $this->belongsTo('App\category','category');
    }

    public function doctor()
    {
    return $this->belongsTo('App\doctor','user_id');
    }


}

