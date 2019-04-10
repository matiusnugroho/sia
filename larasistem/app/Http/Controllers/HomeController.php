<?php

namespace SIAStar\Http\Controllers;

use SIAStar\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use SIAStar\User;
use SIAStar\Guru;
use SIAStar\Siswa;
use SIAStar\MataPelajaran;
use SIAStar\TahunAjaran;
use SIAStar\Lokal;
use Carbon\Carbon as Tanggal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $dataView;
    public function __construct()
    {
        //$this->populateDashBoardData();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->populateDashBoardData();
        return view('dashboard.'.Auth::user()->role,$this->dataView);
    }
    public function populateDashBoardData(){
        $jam = Tanggal::now('GMT+7')->hour;
        if($jam>0 && $jam <11)
        {
            $salam = 'pagi';
        }
        else if($jam >= 11 && $jam <= 13)
        {
            $salam = 'siang';
        }
        else if($jam >=13 && $jam <= 18)
        {
            $salam = 'sore';
        }
        else
        {
            $salam = 'malam';
        }
        switch (Auth::user()->role) {
            case 'admin':
                $ta = TahunAjaran::where('status',1)->first();
                
                $user = User::all()->count();
                $guru = Guru::where('status',1)->count();
                $siswa = Siswa::where('status',1)->count();
                $lokal = Lokal::where('ta',$ta->id)->count();
                $mataPelajaran = MataPelajaran::all()->count();
                $this->dataView = compact('user','guru','siswa','salam','lokal','mataPelajaran','ta');
                break;
            case 'guru':
            	$this->dataView = compact('salam');
            	# code...
            	break;
            case 'siswa':
                $this->dataView = compact('salam');
                break;
            
            default:
                $anak = Auth::user()->ortu->anak;
                $anak->load('user');
               $this->dataView = compact('salam','anak');
                break;
        }
    }
    public function tes()
    {
        //return dd(Auth::user());
        $fakerku = new \Faker\Generator();
        $fakerku->addProvider(new \Faker\Provider\id_ID\Person ($fakerku));
        $fakerku->addProvider(new \Faker\Provider\id_ID\Company ($fakerku));
        $fakerku->addProvider(new \Faker\Provider\id_ID\Internet ($fakerku));
        $fakerku->addProvider(new \Faker\Provider\id_ID\Person ($fakerku));
        $fakerku->addProvider(new \Faker\Provider\id_ID\PhoneNumber ($fakerku));
        return dd($fakerku->name);
    }
    public function tesx()
    {
        //return dd(Auth::user());
        if(Auth::user()->role=="admin")
            {return "ok";}
        else
            {return view('takboleh');}
    }
}
