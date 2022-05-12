<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_has_roles extends Model
{
    protected $table='model_has_roles';
    public function user()
    {
    return $this->belongsTo('App\User','model_id');
    }
    public function roles(){
        return $this->belongsTo('App\roles','role_id');
    }
}
