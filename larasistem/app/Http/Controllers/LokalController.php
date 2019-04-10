<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use SIAStar\Lokal;
use SIAStar\Kelas;
use SIAStar\Guru;
use SIAStar\Siswa;
use SIAStar\LokalSiswa;
use SIAStar\TahunAjaran;
use SIAStar\Jurusan;
class LokalController extends Controller
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
        $lokal = Lokal::orderBy('ta','desc')->orderBy('id_kelas')->paginate(9);
        $lokal->load('tahunAjaran');
        $kelas = Kelas::pluck('kelas','id');
        $wali = Guru::pluck('nama','id');
        $jurusan = Jurusan::pluck('jurusan','id');
        $ta = TahunAjaran::pluck('ta','id');
        return view('lokal.index',compact('lokal','kelas','wali','ta','jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::pluck('kelas','id');
        $wali = Guru::pluck('nama','id');
        $ta = TahunAjaran::pluck('ta','id');
        return view('lokal.create',compact('kelas','wali','ta'));
    }
    public function perTA(Request $r)
    {
        $ta=$r->ta;
        
        $lokal = Lokal::with('siswa')->where('ta',$ta)->paginate(12);
        //return dd($lokal);
        $kelas = Kelas::pluck('kelas','id');
        $wali = Guru::pluck('nama','id');
        $ta = TahunAjaran::pluck('ta','id');
        $jurusan = Jurusan::pluck('jurusan','id');
        return view('lokal.index',compact('lokal','kelas','wali','ta','jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $data=[];
        $data['id_kelas'] = $request->id_kelas;
        $data['nama'] = $request->nama;
        $data['guru_id'] = $request->guru_id; 
        $data['id_jurusan'] = $request->jurusan;
        $data['ta'] = $request->ta;
        Lokal::insert($data);
        return redirect('lokal')->with('sukses','Lokal '.$request->nama.' berhasil ditambahkan');
    }

    public function tambahSiswa($id)
    {
        $lokal = Lokal::find($id)->load('kelas');
        $idkelas = $lokal->id_kelas;
        $lokalSama = array_flatten(Lokal::where('id_kelas',$lokal->id_kelas)->where('ta',$lokal->ta)->where('nama',$lokal->nama)->select(['id'])->get()->toArray());
        $lokalLainSekelas = array_flatten(Lokal::whereNotIn('id',$lokalSama)->where('ta',$lokal->ta)->where('id_kelas',$lokal->id_kelas)->select(['id'])->get()->toArray());
        $siswa = Siswa::whereHas('lokal',function($lokal) use ($lokalLainSekelas) {$lokal->whereNotIn('id',$lokalLainSekelas);})->orWhere(function($siswa){$siswa->doesntHave('lokal');})->get();
        return view('lokal.tambahsiswa',compact('lokal','siswa'));
    }

    public function simpanSiswaLokal(Request $request, $id)
    {
        $sumber = Lokal::find($id);
        $id_siswa = $request->id_siswa;
        $lokalSama = Lokal::where('id_kelas',$sumber->id_kelas)->where('ta',$sumber->ta)->where('nama',$sumber->nama)->get();
        $dataLokalSiswa = [];
        foreach ($lokalSama as $lokal) {
            foreach ($id_siswa as $ids) {
                $data=[];
                $data['siswa_id']=$ids;
                $data['id_lokal']=$lokal->id;
                $dataLokalSiswa[]=$data;
            }
        }
        

        LokalSiswa::insert($dataLokalSiswa);
        return redirect('lokal/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lokal = Lokal::find($id);
        $lokal->load('guru','kelas','siswa');
        $jumlahSiswa = $lokal->siswa->count();
        $jk=[1=>'Laki-laki',2=>'Perempuan'];
        return view('lokal.show',compact('lokal','jumlahSiswa','jk'));
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
