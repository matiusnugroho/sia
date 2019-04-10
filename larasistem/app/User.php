<?php

namespace SIAStar;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $fillable = ['username','password','role'];

    public function guru(){
        return $this->hasOne('SIAStar\Guru','id_user');
    }
    public function siswa(){
        return $this->hasOne('SIAStar\Siswa','id_user');
    }
    public function ortu()
    {
        return $this->hasOne('SIAStar\OrangTua','id_user');
    }
}
