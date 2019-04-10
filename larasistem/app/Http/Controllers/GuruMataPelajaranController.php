<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use SIAStar\Lokal;
use SIAStar\Guru;
use SIAStar\GuruMapel;
use SIAStar\MataPelajaran;
use SIAStar\MapelLokalGuru;
use SIAStar\TahunAjaran;

class GuruMataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('adminakses');        
    }
    public function index()
    {
        $ta = TahunAjaran::orderBy('ta','desc')->get()->pluck('ta','id');
        $lokal = Lokal::with('tahunAjaran','kelas','jurusan')->get()->groupBy('ta')->toJson();
        return view('admin.gurumatapelajaran.pilihtampil',compact('ta','lokal'));
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
    public function displayGuru(Request $r)
    {
        $ta = $r->ta;
        $idlokal=[];
        $lokal = Lokal::where('ta',$ta)->orderBy('id_kelas')->get();
        $mapel = MataPelajaran::all();
        $reservedGuru=[];
        foreach ($lokal as $l) {
            $idlokal[]=$l->id;
            foreach ($mapel as $m) {
                $reservedGuru[$l->id."-".$m->id]=0;
            }
        }
        $lokal->load('kelas');
        $lokalBerguru = MapelLokalGuru::whereHas('lokal',function($lokal) use ($idlokal){
            $lokal->whereIn('id_lokal',$idlokal);
        })->get();
        
        foreach ($lokalBerguru as $lbg) {
            $key = $lbg->id_lokal."-".$lbg->mapel_id;
            if(array_has($reservedGuru,$key))
            {
                $reservedGuru[$key]=$lbg->guru_id;
            }
        }
        //return dd($reservedGuru);
        $guru = Guru::pluck('nama','id');
        $guru->prepend('Guru belum ditetapkan');
        //return dd($guru);
        return view('admin.gurumatapelajaran.display',compact('lokal','guru','mapel','reservedGuru','ta'));
    }
    
    public function setGuru(Request $r)
    {
        $ta = $r->ta;
        $lokal = $r->lokal;
        $infolokal = Lokal::with('kelas','jurusan','tahunAjaran')->find($lokal);
        $mapellokal = MapelLokalGuru::with('guru')->where('id_lokal',$lokal)->get()->keyBy('mapel_id');
        $mapel = Matapelajaran::whereHas('lokal',function($l) use($lokal){
            $l->where('lokal.id',$lokal);
        })->get();
        $guruPerMapel = GuruMapel::with('guru')->get()->groupBy('id_mapel')->toJson();
        $listMapel = MataPelajaran::pluck('nama','id');
        //return dd($guruPerMapel);
        return view('admin.gurumatapelajaran.set',compact('infolokal','mapel','listMapel','guruPerMapel','mapellokal'));
    }
    public function setGuruSave(Request $r,$id_lokal)
    {
        $guru_id = $r->id_guru;
        $mapel_id = $r->id_mapel;
        MapelLokalGuru::updateOrCreate(['id_lokal'=>$id_lokal,'mapel_id'=>$mapel_id],['guru_id'=>$guru_id]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        switch ($id) {
            case 'set':
                $ta = Lokal::distinct()->orderBy('ta','desc')->get(['ta'])->pluck('ta','ta');
                return view('admin.gurumatapelajaran.index',compact('ta'));
                break;
            
            default:
                # code...
                break;
        }
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
    public function update(Request $request, $id)
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
