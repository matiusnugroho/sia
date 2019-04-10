<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use SIAStar\Http\Requests\JamAjarRequest;
use SIAStar\Sesi;

class JamAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public $hari =[
        1=>"Senin",
        2=>"Selasa",
        3=>"Rabu",
        4=>"Kamis",
        5=>"Jumat",
        6=>"Sabtu"
    ];
    public function index()
    {
        $sesi = Sesi::all()->groupBy('hari',true)->map(function($ke){
            return $ke->keyBy('ke');
        })->toArray();
        $maxKe = Sesi::max('ke');
        //return dd($sesi);
        $hari =$this->hari;
        $maxHari = Sesi::max('hari');
        return view ('admin.jamajar.index',compact('sesi','maxKe','hari','maxHari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hari =$this->hari;
        return view ('admin.jamajar.tambah',compact('hari'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JamAjarRequest $request)
    {
        $sesi = new Sesi();
        $sesi->ke =$request->ke;
        $sesi->hari= $request->hari;
        $sesi->jam = $request->jam;
        $sesi->save();
        return redirect('jamajar')->with('sukses','Jam ajar untuk hari '.$this->hari[$request->hari].' berhasil ditambahkan');
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
