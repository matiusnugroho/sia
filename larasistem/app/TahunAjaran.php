<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table= 'tahun_ajaran';
    public $timestamps = false;

    public function lokal()
    {
        return $this->hasMany('SIAStar\Lokal','ta','id');
    }
}
