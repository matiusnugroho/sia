<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;
use SIAStar\FormNilai;

class Nilai extends Model
{
    protected $table = 'nilai';
    public $timestamps = false ;

    protected $fillable = ['siswa_id','nilai','id_form_nilai'];

    public function siswa()
    {
    	return $this->belongsTo('SIAStar\Siswa','siswa_id');
    }
    public function formNilai()
    {
    	return $this->belongsTo('SIAStar\FormNilai','id_form_nilai');
    }
    public function mapelLokalGuru()
    {
    	return $this->formNilai->mataPelajaranLokalGuru;
    }
}