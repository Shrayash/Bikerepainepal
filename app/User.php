<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','facebook_id','verifyToken'
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctors()
    {
    return $this->hasOne('App\doctor','user_id');
    }

    public function doctor_medias()
    {
    return $this->hasOne('App\doctor_social_media','user_id');
    }

    public function model_has_roles()
    {
    return $this->hasOne('App\model_has_roles','model_id');
    }

    public function videos()
    {
        return $this->hasMany('App\videos','user_id');
    }

    public function publication()
    {
        return $this->hasMany('App\publication','user_id');
    }

    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();


        if(is_null($check)){
            return static::create($input);
        }


        return $check;
    }
}
