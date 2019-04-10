<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class FormNilai extends Model
{
    protected $table = 'form_nilai';
    public $timestamps=false;

    protected $fillable = ['judul','id_mapel_lokal','tanggal'];

    public function mataPelajaranLokalGuru()
    {
    	return $this->belongsTo('SIAStar\MapelLokalGuru','id_mapel_lokal');
    }
    public function nilai()
    {
    	return $this->hasMany('SIAStar\Nilai','id_form_nilai');
    }
}
