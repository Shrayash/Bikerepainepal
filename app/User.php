<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasRoles;
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     */
    public $timestamps = true;
    protected $fillable = [
        'frst_name', 'last_name', 'password','mobile_no','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    public function model_has_roles()
    {
    return $this->hasOne('App\model_has_roles','model_id');
    }

    public function customer()
    {
    return $this->hasMany('App\customer_vehicles','customer_id');
    }

    public function customer_order()
    {
    return $this->hasMany('App\Order','id');
    }

    public function getMobileForPasswordReset()
    {
        return $this->mobile_no;
    }

}
