<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor_social_media extends Model
{
    protected $table='doctor_social_media';
    public $primaryKey = 'id';
    public $timestamps = true;
    public $fillable =['facebook','twitter','youtube','linkedin','user_id'];

    public function user()
    {
    return $this->belongsTo('App\User','user_id');
    }
    public function doctor()
    {
    return $this->belongsTo('App\doctor','user_id');
    }
}
