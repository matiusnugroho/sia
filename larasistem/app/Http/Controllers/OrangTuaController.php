<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use SIAStar\Http\Requests\FormOrtuRequest;
use SIAStar\OrangTua;
use SIAStar\Siswa;
use SIAStar\User;

class OrangTuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orangtua = OrangTua::with('user')->paginate();
        return view('admin.orangtua.index',compact('orangtua'));
    }
    public function cari(Request $r)
    {
        $orangtua = OrangTua::with('user')->where('nama','like','%'.$r->q.'%')->paginate($r->limit);
        return view('admin.orangtua.index',compact('orangtua'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::whereDoesntHave('orangTua')->get();
        return view('admin.orangtua.tambah',compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormOrtuRequest $request)
    {
        $nis = Siswa::find($request->id_siswa[0])->nis;
        $username = "ot".$nis;
        $user = User::create([
                'username'=>$username,
                'role'=>'ortu',
                'password'=>bcrypt('loginortu')
            ]);
        $ortu = new OrangTua();
        $ortu->nama = $request->nama;
        $ortu->no_telepon = $request->no_telepon;
        $ortu->alamat = $request->alamat;
        $user->ortu()->save($ortu);
        Siswa::whereIn('id',$request->id_siswa)->update(['id_ortu'=>$ortu->id]);
        return redirect('orangtua')->with('suskses','Data Orang tua telah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = OrangTua::with('user','anak.user')->find($id);
        $anak = $data->anak;
        return view('admin.orangtua.anak',compact('data','anak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ortu = OrangTua::find($id);
        $siswa = Siswa::whereDoesntHave('orangTua')->get();
        return view('admin.orangtua.edit',compact('ortu','siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormOrtuRequest $request, $id)
    {
        $ortu = OrangTua::find($id);
        $ortu->nama = $request->nama;
        $ortu->no_telepon = $request->no_telepon;
        $ortu->alamat = $request->alamat;
        $ortu->save();
        if(!is_null($request->id_siswa))
        {
            Siswa::whereIn('id',$request->id_siswa)->update(['id_ortu'=>$ortu->id]);
        }
        return redirect('orangtua')->with('suskses','Data Orang tua telah diubah');
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
