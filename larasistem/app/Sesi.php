<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = 'sesi';
    public $timestamps = false;

    public function jadwal()
    {
        return $this->hasMany('SIAStar\Jadwal','id_sesi');
    }
}
