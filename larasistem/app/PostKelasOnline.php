<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class PostKelasOnline extends Model
{
    protected $table='post_kelas_online';
    public $timestamps = false;

    public function mataPelajaranLokalGuru()
    {
    	return $this->belongsTo('SIAStar\MapelLokalGuru','id_mapel_lokal');
    }

    public function komentar()
    {
    	return $this->hasMany('SIAStar\KomentarMateri','materi_id');
    }
}
