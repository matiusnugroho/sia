<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class KomentarMateri extends Model
{
    protected $table = 'komentar_materi';
    public $timestamps = false;

    public function replies()
    {
    	return $this->hasMany("SIAStar\ReplyKomentarMateri",'komen_materi_id');
    }
    public function user()
    {
    	return $this->belongsTo('SIAStar\User','users_id');
    }
    public function materi()
    {
    	return $this->belongsTo('SIAStar\PostKelasOnline','materi_id');
    }
}
