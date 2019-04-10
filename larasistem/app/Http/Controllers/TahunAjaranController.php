<?php

namespace SIAStar\Http\Controllers;

use SIAStar\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
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
        $data = TahunAjaran::paginate(20);
        $status = [0=>"Tidak aktif",1=>"aktif"];
        return view('admin.tahunajaran.index',compact('data','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tahunajaran.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
                "ta"=>$request->tahunajaran,
                "status"=>1
            ];
            TahunAjaran::query()->update(['status'=>0]);
            TahunAjaran::insert($data);
            return redirect('tahunajaran')->with('sukses','Tahun ajaran '.$request->nama.' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SIAStar\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function show(TahunAjaran $tahunAjaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SIAStar\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function edit(TahunAjaran $tahunAjaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SIAStar\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TahunAjaran $tahunAjaran)
    {
        $tahunAjaran = TahunAjaran::find($tahunAjaran);
        $tahunAjaran->status= $request->status;
        $tahunAjaran->save();
        return redirect('tahunajaran')->with('sukses','Tahun ajaran '.$request->nama.' berhasil ditambahkan');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SIAStar\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(TahunAjaran $tahunAjaran)
    {
        //
    }
}
