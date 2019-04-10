<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table ='orang_tua';
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('SIAStar\User','id_user');
    }
    public function anak()
    {
    	return $this->hasMany('SIAStar\Siswa','id_ortu');
    }
}
