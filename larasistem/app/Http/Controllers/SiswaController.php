<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use SIAStar\Http\Requests\FormSiswaRequest;
use SIAStar\Siswa;
use SIAStar\StatusSiswa;
use SIAStar\User;
class SiswaController extends Controller
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
        $siswa = Siswa::paginate(20);
        $siswa->load('user');
        $jk = [1=>"Laki-laki",2=>"Perempuan"];
        return view('admin.siswa.index',compact('siswa','jk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jk =['1'=>'Laki-laki','2'=>'Perempuan'];
        $agama = [1=>"Islam",2=>"Protestan",3=>"Katolik",4=>"Himdu", 5=>"Budha"];
        $userAvailable = User::where('role','siswa')->doesntHave('siswa')->get();
        $listUserAvailable = $userAvailable->pluck('username','id');
        return view('admin.siswa.tambah',compact('jk','listUserAvailable','agama'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormSiswaRequest $request)
    {
        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nisn = $request->nisn;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->agama = $request->agama;
        $siswa->status_dalam_keluarga = $request->status_dalam_keluarga;
        $siswa->anak_ke = $request->anak_ke;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->asal_sekolah = $request->asal_sekolah;
        $siswa->kelas_awal = $request->kelas_awal;
        $siswa->tanggal_diterima = $request->tanggal_diterima;
        $siswa->nama_ayah = $request->nama_ayah;
        $siswa->nama_ibu = $request->nama_ibu;
        $siswa->pekerjaan_ayah = $request->pekerjaan_ayah;
        $siswa->pekerjaan_ibu = $request->pekerjaan_ibu;
        $siswa->alamat_ortu = $request->alamat_ortu;
        $siswa->telp_ortu = $request->telp_ortu;
        $siswa->nama_wali = $request->nama_wali;
        $siswa->alamat_wali = $request->alamat_wali;
        $siswa->pekerjaan_wali = $request->pekerjaan_wali;
        $siswa->telepon_wali = $request->telepon_wali;
        $user = User::create([
                'username'=>$request->nis,
                'password'=>bcrypt('login123'),
                'role'=>'siswa'
        ]);
        $user->siswa()->save($siswa);
        return redirect('/siswa')->with('sukses','Data siswa berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id)->load('user','status_siswa');
        $jk = [1=>"Laki-laki",2=>"Perempuan"];
        $agama = [1=>"Islam",2=>"Protestan",3=>"Katolik",4=>"Himdu", 5=>"Budha"];
        return view('admin.siswa.detailsiswa',compact('siswa','jk','agama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $status = StatusSiswa::pluck('status','id');
        $jk = [1=>"Laki-laki",2=>"Perempuan"];
        $agama = [1=>"Islam",2=>"Protestan",3=>"Katolik",4=>"Himdu", 5=>"Budha"];
        return view('admin.siswa.edit',compact('siswa','jk','agama','status'));
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
        //return dd($request->foto==null);
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->agama = $request->agama;
        $siswa->status_dalam_keluarga = $request->status_dalam_keluarga;
        $siswa->anak_ke = $request->anak_ke;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->asal_sekolah = $request->asal_sekolah;
        $siswa->kelas_awal = $request->kelas_awal;
        $siswa->tanggal_diterima = $request->tanggal_diterima;
        $siswa->nama_ayah = $request->nama_ayah;
        $siswa->nama_ibu = $request->nama_ibu;
        $siswa->pekerjaan_ayah = $request->pekerjaan_ayah;
        $siswa->pekerjaan_ibu = $request->pekerjaan_ibu;
        $siswa->alamat_ortu = $request->alamat_ortu;
        $siswa->telp_ortu = $request->telp_ortu;
        $siswa->nama_wali = $request->nama_wali;
        $siswa->alamat_wali = $request->alamat_wali;
        $siswa->pekerjaan_wali = $request->pekerjaan_wali;
        $siswa->telepon_wali = $request->telepon_wali;
        $siswa->status = $request->status;
        if ($request->foto!=null){
            $request->foto->move('foto/siswa/'.$id.'//asli//',"foto_".$id.".jpg");
            $siswa->foto = 'foto/siswa/'.$id.'/asli/foto_'.$id.'.jpg';
        }
        else {
            $siswa->foto="";
        }
        $siswa->save();
        return redirect('/siswa')->with('sukses','Data siswa berhasil diubah');
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
     public function cariSiswa(Request $request)
    {
        $q = $request->q;
        $lim = $request->limit;
        $jk = [1=>"Laki-laki",2=>"Perempuan"];
        $siswa = Siswa::where('nis','like','%'.$q.'%')->orWhere('nama','like','%'.$q.'%')->paginate($lim);
        $siswa->setPath('cari?limit='.$lim.'&q='.$q);
        return view('admin.siswa.index',compact('siswa','jk'));
    }
}
