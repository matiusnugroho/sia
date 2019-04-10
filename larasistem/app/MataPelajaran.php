<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'matapelajaran';
    public $timestamps=false;
    protected $fillable =['nama'];

    public function guru()
    {
    	return $this->belongsToMany('SIAStar\Guru','mapel_lokal_guru','mapel_id')->withPivot('id_lokal');
    }
    public function lokal()
    {
    	return $this->belongsToMany('SIAStar\Lokal','mapel_lokal_guru','mapel_id','id_lokal')->withPivot('id_lokal');
    }
    
    public function gurupengampu()
    {
        return $this->belongsToMany('SIAStar\Guru','guru_mapel','id_mapel','id_guru');
    }
    
    public function kelompok()
    {
        return $this->belongsTo('SIAStar\KelompokMapel','id_kelompok');
    }
}
