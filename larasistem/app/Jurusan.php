<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table= 'jurusan';
    public $timestamps = false;
    public function ketuaJurusan()
    {
        return $this->belongsto('SIAStar\Guru','ketua_jurusan');
    }
}
