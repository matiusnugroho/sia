<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class Lokal extends Model
{
    protected $table= 'lokal';
    public $timestamps = false;
    public function kelas()
    {
    	return $this->belongsTo('SIAStar\Kelas','id_kelas');
    }
    public function jurusan()
    {
    	return $this->belongsTo('SIAStar\Jurusan','id_jurusan');
    }
    public function tahunAjaran()
    {
        return $this->belongsTo('SIAStar\TahunAjaran','ta');
    }
    public function postMateri()
    {
    	return $this->hasManyThrough('SIAStar\PostKelasOnline','SIAStar\MapelLokalGuru','id_lokal','id_mapel_lokal');
    }
    public function mataPelajaran()
    {
        return $this->belongsToMany('SIAStar\MataPelajaran','mapel_lokal_guru','id_lokal','mapel_id')->withPivot('id_lokal');
    }
    public function formNilai()
    {
        return $this->hasManyThrough('SIAStar\FormNilai','SIAStar\MapelLokalGuru','id_lokal','id_mapel_lokal');
    }
    public function jadwal()
    {
        return $this->hasManyThrough('SIAStar\Jadwal','SIAStar\MapelLokalGuru','id_lokal','id_mapel_lokal');
    }
    public function siswa()
    {
        return $this->belongsToMany('SIAStar\Siswa','siswa_lokal','id_lokal','siswa_id');
    }
    public function guru()
    {
        return $this->belongsTo('SIAStar\Guru','guru_id');
    }
}
