<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video_contents extends Model
{
    protected $table='video_contents';
    public $primaryKey = 'id';
    public $timestamps = true;
    public $fillable =['parent_id','name','description','link'];

     public function videos()
    {
    return $this->belongsTo('App\videos','parent_id');
    }
}