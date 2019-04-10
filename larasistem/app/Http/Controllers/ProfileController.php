<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use Hash;

class ProfileController extends Controller
{
    private $user;
    private $role;
    private $uid;//user id
    private $aktor; //guru/siswa 
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->getUserData();
            return $next($request);
        });
    }
    public function index()
    {
        $saya = $this->aktor;
        $jeka = [1=>'Laki-Laki',2=>'Perempuan'];
        $saya->load('user');
        return view('profile.'.$this->role.'.index',compact('saya','jeka'));
       
    }

    public function getUserData()
    {
        $user = Auth::user();
        $this->user = $user;
        $this->role = $user->role;
        $this->uid = $user->{$user->role}->id;
        $this->aktor = $user->{$user->role};
    }

    public function edit()
    {
    	$saya = $this->aktor;
    	$jk = [1=>'Laki-Laki',2=>'Perempuan'];
        return view('profile.'.$this->role.'.edit',compact('saya','jk'));
    }

    public function simpanGuru(Request $request)
    {
    	$saya = $this->aktor;
    	$user = $saya->user;
    	$user->username = $request->username;
    	$saya->nama = $request->nama;
    	if(!is_null($request->password_new))
    	{
    		$user->password = Hash::make($request->password);
    	}
        $saya->jenis_kelamin = $request->jenis_kelamin;
        $saya->tgl_lahir = $request->tgl_lahir;
        if ($request->file('pp')!=null){
            $ext = $pp->extension();
            $namafile = $username."_pp.".$ext;
            $request->file('pp')->move('img/'.$username,$namafile);
            $user->pp = $namafile;
        }
        $saya->save();
        $user->save();
        return redirect('profile')->with('sukses','Profil telah diperbaharui');
    }
    public function simpanSiswa(Request $request)
    {
    	$saya = $this->aktor;
    	$user = $saya->user;
    	$user->username = $request->username;
    	$saya->nama = $request->nama;
        $saya->jenis_kelamin = $request->jenis_kelamin;
        $saya->tgl_lahir = $request->tgl_lahir;
        if(!is_null($request->password_new))
    	{
    		$user->password = Hash::make($request->password);
    	}
        if ($request->file('pp')!=null){
            $ext = $pp->extension();
            $namafile = $username."_pp.".$ext;
            $request->file('pp')->move('img/'.$username,$namafile);
            $user->pp = $namafile;
        }
        $saya->save();
        $user->save();
        return redirect('profile')->with('sukses','Profil telah diperbaharui');
    }

    public function setFotoProfile(Request $request)
    {
    	if ($request->file('pp')!=null){
            $ext = $pp->extension();
            $namafile = $this->user->username."_pp.".$ext;
            $request->file('pp')->move('img/'.$username,$namafile);
            $this->user->pp = $namafile;
        }
        if($request->isAjax())
        {
        	return json_encode(['sukses'=>1]);
        }
        else
        {
        	return true;
        }
    }
}
