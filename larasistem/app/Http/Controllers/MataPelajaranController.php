<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use SIAStar\MataPelajaran;
use SIAStar\KelompokMapel;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = MataPelajaran::with('gurupengampu','kelompok')->get();
        return view('admin.matapelajaran.index',compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setListKelompokMapel()
    {
        $kelompok = KelompokMapel::all();
        foreach($kelompok as $k)
        {
            $data[$k->id] = $k->kelompok.(!empty($k->keterangan)?" (".$k->keterangan.")":"");
        }
        $kelompok = $data;
        return $kelompok;
    }
    public function create()
    {
        $kelompok = $this->setListKelompokMapel();
        return view('admin.matapelajaran.tambah',compact('kelompok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapel = new Matapelajaran();
        $mapel->nama=$request->nama;
        $mapel->kkm=$request->kkm;
        $mapel->kode=$request->kode;
        $mapel->id_kelompok = $request->id_kelompok;
        $mapel->save();
        return redirect('matapelajaran')->with('sukses','Data Mata Pelajaran telah berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mapel = MataPelajaran::find($id);
        $mapel->load('guru');
        $guru = $mapel->gurupengampu;
        $guruPengampu="";
        foreach ($guru as $gp) {
            $guruPengampu .=$gp->nama.", ";
        }
        $guruPengampu = rtrim($guruPengampu,', ');
        return view('admin.matapelajaran.detail',compact('mapel','guruPengampu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = MataPelajaran::with('gurupengampu')->find($id);
        $kelompok = $this->setListKelompokMapel();
        return view('admin.matapelajaran.edit',compact('mapel','kelompok'));
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
        $mapel = MataPelajaran::find($id);
        $mapel->nama=$request->nama;
        $mapel->kkm=$request->kkm;
        $mapel->kode=$request->kode;
        $mapel->id_kelompok = $request->id_kelompok;
        $mapel->save();
        return redirect('matapelajaran')->with('sukses','Data Mata Pelajaran telah berhasil diubah');
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
