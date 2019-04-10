<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use SIAStar\Http\Requests\GuruMapelRequest;
use SIAStar\MataPelajaran;
use SIAStar\Guru;
use SIAStar\GuruMapel;

class GuruPengampuController extends Controller
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
        $mapel = MataPelajaran::with('gurupengampu')->get();
        return view ('admin.gurupengampu.index',compact('mapel'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::where('status',1)->get();
        $mapel = MataPelajaran::with('gurupengampu')->find($id);
        return view('admin.gurupengampu.edit',compact('id','guru','mapel'));
    }
    public function deletepengampu($idmapel,$idpengampu){
        GuruMapel::where('id_mapel',$idmapel)->where('id_guru',$idpengampu)->delete();
        return redirect()->back();
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
        $idguru = $request->id_guru;
        $idx = $id;
        //return dd($id);
        foreach($idguru as $id_guru)
        {
            GuruMapel::updateOrCreate(['id_mapel'=>$idx,'id_guru'=>$id_guru],['id_guru'=>$id_guru]);
        }
        return redirect('gurupengampu')->with('sukses','Guru pengampu telah ditetapkan');
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
