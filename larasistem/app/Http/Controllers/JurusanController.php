<?php

namespace SIAStar\Http\Controllers;

use SIAStar\Jurusan;
use SIAStar\Guru;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::with('ketuaJurusan')->get();
        //return dd($jurusan);
        
        return view('admin.jurusan.index',compact('jurusan','guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('admin.jurusan.tambah',compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jurusan = new Jurusan();
        $jurusan->jurusan = $request->jurusan;
        $jurusan->bidang_keahlian = $request->bidang_keahlian;
        $jurusan->kompetensi_umum = $request->kompetensi_umum;
        $jurusan->kompetensi_khusus = $request->kompetensi_khusus;
        $jurusan->ketua_jurusan = $request->ketua_jurusan;
        $jurusan->save();
        return redirect('jurusan')->with('sukses','Data Jurusan telah berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SIAStar\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SIAStar\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit($jurusan)
    {
        $jurusan = Jurusan::find($jurusan);
        $guru = Guru::pluck('nama','id');
        $guru->prepend("","");
        //return dd($guru);
        return view('admin.jurusan.edit',compact('jurusan','guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SIAStar\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$jurusan)
    {
        $jurusan = Jurusan::find($jurusan);
        $jurusan->jurusan = $request->jurusan;
        $jurusan->bidang_keahlian = $request->bidang_keahlian;
        $jurusan->kompetensi_umum = $request->kompetensi_umum;
        $jurusan->kompetensi_khusus = $request->kompetensi_khusus;
        $jurusan->ketua_jurusan = $request->ketua_jurusan;
        $jurusan->save();
        return redirect('jurusan')->with('sukses','Data Jurusan telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SIAStar\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        //
    }
}
