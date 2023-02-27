<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table='category';
    public $primaryKey = 'id';
    
    public function category()
    {
    return $this->hasMany('App\Inventory','id');
    }
}
