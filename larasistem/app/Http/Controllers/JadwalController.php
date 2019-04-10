<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use SIAStar\Http\Requests\JadwalRequest;
use SIAStar\TahunAjaran;
use SIAStar\Sesi;
use SIAStar\MapelLokalGuru;
use SIAStar\Lokal;
use SIAStar\Jadwal;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $hari =[
        1=>"Senin",
        2=>"Selasa",
        3=>"Rabu",
        4=>"Kamis",
        5=>"Jumat",
        6=>"Sabtu"
    ];
    public function __construct()
    {
        $this->middleware('adminakses');        
    }
    public function index()
    {
        $ta = TahunAjaran::with('lokal.kelas','lokal.jurusan')->where('status',1)->first();
        $lokal = $ta->lokal;
        $dataLokal =[];
        foreach($lokal as $l)
        {
            $record=[];
            $record['id']=$l->id;
            $record['label']= $l->kelas->kelas." ".$l->jurusan->jurusan." ".$l->nama;
            $dataLokal[]=$record;
        }
        $lokal = collect($dataLokal);
        $lokal = $lokal->pluck('label','id');
        return view('admin.jadwal.index',compact('lokal'));
    }

    public function display(Request $r)
    {
        return redirect('jadwal/'.$r->lokal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalRequest $request)
    {
        $jadwal = new Jadwal();
        $jadwal->id_sesi = $request->id_sesi;
        $jadwal->id_mapel_lokal = $request->id_mapel_lokal;
        $jadwal->save();
        return redirect(url()->previous())->with('sukses','Jadwal telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sesi = Sesi::with('jadwal.mapelLokal.guru','jadwal.mapelLokal.matapelajaran')->whereHas('jadwal',function($jadwal) use ($id) {
            $jadwal->whereHas('mapelLokal',function($mapel) use($id) {
                $mapel->where('id_lokal',$id);
            });
        })->get()->groupBy('hari',true)->map(function($ke){
            return $ke->keyBy('ke');
        })->toArray();

        $l = Lokal::with('kelas','jurusan')->find($id);
        $namalokal = $l->kelas->kelas." ".$l->jurusan->jurusan." ".$l->nama;
        $allSesi = Sesi::all()->groupBy('hari',true)->map(function($ke){
            return $ke->keyBy('ke');
        })->toJson();
        //return dd($allSesi);
        $maxKe = Sesi::max('ke');
        $lokal = $id;
        $maxHari = Sesi::max('hari');
        $hari =$this->hari;
        $mapelLokal = MapelLokalGuru::with('matapelajaran','guru')->where('id_lokal',$lokal)->get();
        $dataGuruMapel = [];
        foreach($mapelLokal as $ml)
        {
            $dataGuruMapel[$ml->id]=$ml->matapelajaran->nama." - " .$ml->guru->nama;
        }
        //return dd($dataGuruMapel);
        return view('admin.jadwal.display',compact('sesi','maxKe','maxHari','hari','lokal','allSesi','dataGuruMapel','namalokal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
