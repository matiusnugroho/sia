<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;

use SIAStar\Http\Requests;
use SIAStar\Http\Requests\FormGuruRequest;
use SIAStar\Http\Requests\FormEditGuruRequest;
use SIAStar\Guru;
use SIAStar\User;

class GuruController extends Controller
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
        $guru = Guru::paginate(20);
        $guru->load('user','waliDi');
        //return dd($guru);
        return view('admin.guru.index',compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jk =['1'=>'Laki-laki','2'=>'Perempuan'];
        $userAvailable = User::where('role','guru')->doesntHave('guru')->get();
        $agama = [1=>"Islam",2=>"Protestan",3=>"Katolik",4=>"Himdu", 5=>"Budha"];
        $listUserAvailable = $userAvailable->pluck('username','id');
        return view('admin.guru.tambah',compact('jk','listUserAvailable','agama'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormGuruRequest $request)
    {
        //return dd($request);
        $guru = new Guru();
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->tempat_lahir = $request->tempat_lahir;
        $guru->tgl_lahir = $request->tgl_lahir;
        $guru->agama = $request->agama;
        $guru->no_telepon = $request->no_telp;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->status =1;
        $user = User::create([
                'username'=>$request->nip,
                'password'=>bcrypt('loginsiastar'),
                'role'=>'guru'
            ]);
        $user->guru()->save($guru);
        //$guru->save();
        return redirect('/guru')->with('sukses','Data guru berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::find($id)->load('user');
        $jk = [1=>"Laki-laki",2=>"Perempuan"];
        $agama = [1=>"Islam",2=>"Protestan",3=>"Katolik",4=>"Himdu", 5=>"Budha"];
        return view('admin.guru.detailguru',compact('guru','jk','agama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        $jk =['1'=>'Laki-laki','2'=>'Perempuan'];
        $userAvailable = User::where('role','guru')->doesntHave('guru')->get();
        $agama = [1=>"Islam",2=>"Protestan",3=>"Katolik",4=>"Himdu", 5=>"Budha"];
        $listUserAvailable = $userAvailable->pluck('username','id');
        return view('admin.guru.edit',compact('guru','jk','listUserAvailable','agama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormEditGuruRequest $request, $id)
    {
        $guru = Guru::find($id);
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tempat_lahir = $request->tempat_lahir;
        $guru->tgl_lahir = $request->tgl_lahir;
        $guru->agama = $request->agama;
        $guru->no_telepon = $request->no_telp;
        $guru->save();
        return redirect('/guru')->with('sukses','Data guru berhasil diubah');
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
    public function cariGuru(Request $request)
    {
        $q = $request->q;
        $lim = $request->limit;
        $guru = Guru::where('nip','like','%'.$q.'%')->orWhere('nama','like','%'.$q.'%')->paginate($lim);
        $guru->setPath('cari?limit='.$lim.'&q='.$q);
        return view('admin.guru.index',compact('guru'));
    }
}
