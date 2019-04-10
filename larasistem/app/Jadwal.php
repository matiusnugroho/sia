<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table= 'jadwal';
    public $timestamps = false;

    public function mapelLokal()
    {
        return $this->belongsTo('SIAStar\MapelLokalGuru','id_mapel_lokal');
    }
}
