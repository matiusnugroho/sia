<?php

namespace SIAStar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Siswa extends Model
{
    
    use Notifiable;
    
    protected $table='siswa';
    public $timestamps=false;

    public function formNilai()
    {
    	return $this->belongsToMany('SIAStar\FormNilai','nilai','id','id_form_nilai')->withPivot('nilai');
    }
    public function lokal()
    {
    	return $this->belongsToMany('SIAStar\Lokal','siswa_lokal','siswa_id','id_lokal');
    }
    public function user(){
        return $this->belongsTo('SIAStar\User','id_user');
    }
    public function orangTua()
    {
        return $this->belongsTo('SIAStar\OrangTua','id_ortu');
    }
    public function pa()
    {
        return $this->belongsTo('SIAStar\Guru','id_pa');
    }
    public function status_siswa()
    {
        return $this->belongsTo('SIAStar\StatusSiswa','status');
    }
}
