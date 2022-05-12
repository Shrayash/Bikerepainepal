<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publication extends Model
{
    protected $table='publications';
    public $primaryKey = 'id';
    public $timestamps = true;
    public function user()
    {
    return $this->belongsTo('App\User','user_id');
    }
}
