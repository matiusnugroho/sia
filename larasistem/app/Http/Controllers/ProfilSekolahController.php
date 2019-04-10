<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use File;

class ProfilSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolah = config('sia');
        return view('admin.profilsekolah.index',compact('sekolah'));
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
        $data="[
        'nama_sekolah'=>'$request->nama_sekolah',
        'npsn'=>'$request->npsn',
        'nss'=>'$request->nss',
        'alamat'=>'$request->alamat',
        'telp'=>'$request->telp',
        'email'=>'$request->email',
        'web'=>'$request->web'
    ];";
            //return dd ($data);
            if(File::put(config_path() . '/sia.php', "<?php\n return\n $data")) {
                return redirect('profilsekolah')->with('sukses','Data sekolah telah diubah');
            }
            //return dd($data);
        
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
