<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $table='doctors';
    public $fillable =['name','profilepic','education','post','description','user_id'];
    public $primaryKey = 'id';
    public $timestamps = true;

     public function user()
    {
    return $this->belongsTo('App\User','user_id');
    }
    public function doctor_social_media()
    {
    return $this->hasOne('App\doctor_social_media','user_id');
    }
    public function videos()
    {
    return $this->hasOne('App\videos','user_id');
    }
}

