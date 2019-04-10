<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class LokalSiswa extends Model
{
    protected $table = 'siswa_lokal';
    public $timestamps = false;

    protected $fillable = ['id_lokal','siswa_id'];
}
