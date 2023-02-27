<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qr_data extends Model
{
    protected $table='qr_generate';
    public $fillable =['qr_code','qr_result'];
    public $primaryKey = 'id';
    public $timestamps = true;

 
}
 