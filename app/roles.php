<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table='roles';
    public function model_has_roles()
    {
    return $this->hasOne('App\model_has_roles','role_id');
    }
}
