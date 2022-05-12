<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    protected $table='groups';
    public $primaryKey = 'id';

    public function group()
    {
        return $this->hasMany('App\videos','group');
    }
}
