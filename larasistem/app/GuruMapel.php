<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class GuruMapel extends Model
{
    protected $table= 'guru_mapel';
    public $timestamps = false;
    protected $fillable =['id_guru','id_mapel'];

    public function guru()
    {
        return $this->belongsTo('SIAStar\Guru','id_guru');
    }
}
