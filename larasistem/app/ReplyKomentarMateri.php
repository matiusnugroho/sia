<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;

class ReplyKomentarMateri extends Model
{
    protected $table = 'reply_komen_materi';
    public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo('SIAStar\User','user_id');
    }
    public function komentarnya()
    {
    	return $this->belongsTo('SIAStar\KomentarMateri','komen_materi_id');
    }
}
