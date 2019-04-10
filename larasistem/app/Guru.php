<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Guru extends Model
{
    use Notifiable;

    protected $table ='guru';
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('SIAStar\User','id_user');
    }

    public function mataPelajaran($idlokal=null)
    {
    	if($idlokal==null)
        {
            return $this->belongsToMany('SIAStar\MataPelajaran','mapel_lokal_guru','guru_id','mapel_id')->withPivot('id_lokal');
        }
        else
        {
            return $this->belongsToMany('SIAStar\MataPelajaran','mapel_lokal_guru','guru_id','mapel_id')->wherePivotIn('id_lokal',$idlokal)->withPivot('id_lokal')->get();
        }
    }

    public function postMateri()
    {
    	return $this->hasManyThrough('SIAStar\PostKelasOnline','SIAStar\MapelLokalGuru','guru_id','id_mapel_lokal');
    }

    public function waliKelasDi()
    {
        return $this->hasMany('SIAStar\Lokal','guru_id');
    }
    public function siswa()
    {
        return $this->hasMany('SIAStar\Siswa','id_pa');
    }

    public function mengampu()
    {
        return $this->belongsToMany('SIAStar\MataPelajaran','mapel_guru','id_mapel');
    }
    public function waliDi()
    {
        return $this->hasOne('SIAStar\Lokal')->whereHas('tahunAjaran',function($ta){
            $ta->where('status',1);
        });
    }
    public function sekarangWaaliDi()
    {
        return $this->waliDi()->whereHas('tahunAjaran',function($ta){
            $ta->where('status',1);
        });
    }
}
