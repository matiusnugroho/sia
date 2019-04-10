<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class MapelLokalGuru extends Model
{
    protected $table = 'mapel_lokal_guru';
    protected $fillable = ['id_lokal','mapel_id','guru_id'];
    public $timestamps=false;

    public function mataPelajaran()
    {
    	return $this->belongsTo('SIAStar\MataPelajaran','mapel_id');
    }
    public function guru()
    {
    	return $this->belongsTo('SIAStar\Guru','guru_id');
    }
    public function formNilai()
    {
    	return $this->hasMany('SIAStar\FormNilai','id_mapel_lokal');
    }
    public function lokal()
    {
    	return $this->belongsTo('SIAStar\Lokal','id_lokal');
    }
    public function postMateri()
    {
        return $this->hasMany('SIAStar\PostKelasOnline','id_mapel_lokal');
    }
}
