<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use SIAStar\Notifications\Notifikasi;
use Auth;
use Carbon\Carbon as DateCarbon;
use SIAStar\PostKelasOnline;
use SIAStar\Lokal;
use SIAStar\Guru;
use SIAStar\MapelLokalGuru;
use SIAStar\KomentarMateri;
use SIAStar\ReplyKomentarMateri;
use SIAStar\Http\Requests\MateriRequest;



class ElearningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    private $role;
    private $id;
    private $saya;
    public function __construct()
    {
        //$this->middleware('SIAStar\Http\Middleware\AksesRekapNilai');
        $this->middleware(function ($request, $next) {
            $this->getUserData();
            return $next($request);
        });
    }
    public function getUserData()
    {
        $user = Auth::user();
        $this->user = $user;
        $this->role = $user->role;
        $this->saya = $user->{$user->role};
        $this->id = $user->guru==null?$user->siswa->nis:$user->guru->nip;
    }
    public function index()
    {
        //
        $data=$this->setDataView($this->role);
        //return dd($po);
        return view('elearning.index'.$this->role,$data);
    }

    public function getMapelDariGuru()
    {
        $guru = $this->user->guru;
        $mapel = $guru->mataPelajaran;
        return $mapel;
    }
    public function getMapelDariSiswa(){
        $siswa =$this->user->siswa;
        $lokal = $siswa->lokal;
        $lokal->load('mataPelajaran');
        return $lokal;
    }

    public function buildLokalList()
    {
        $mapel = $this->getMapelDariGuru();
        $idLokal =[];
        //ambil id lokal dari mapel untuk diambil lokal mana saja yang termasuk ke dalam mapel itu
        $listLokal=[];
        foreach ($mapel as $m) {
            $idLokal[]=$m->pivot->id_lokal;
        }
        //ambil Lokal dalam satu query yang id-nya ada ditabel
        $lokal = Lokal::whereIn('id',$idLokal)->get();
        $lokal->load('kelas');
        //dapatkan nama kelasnya
        foreach ($lokal as $l) {
            $listLokal[$l->id]=$l->kelas->kelas." ".$l->nama;
        }
        return $listLokal;
    }

    public function buildLokalListSiswa()
    {
        $siswa = $this->user->siswa;
        $lokal = $siswa->lokal;
        $listLokal=[];
        $lokal->load('kelas');
        $listLokal[0]="Pilih Lokal";
        foreach ($lokal as $l) {
            $listLokal[$l->id]=$l->kelas->kelas." ".$l->nama;
        }
        return $listLokal;
    }


    public function buildMapelOfLokalCollection()
    {
        $siswa = $this->user->siswa;
        $lokal = $siswa->lokal;
        $lokal->load('mataPelajaran');
        $mapelOfLokal=[];
        foreach ($lokal as $l) 
        {
            $mapelOfLokal[$l->id]=[];
            $mp = $l->mataPelajaran;
            foreach ($mp as $m) {
                $mdata=[];
                $mdata['idmapel']=$m->id;
                $mdata['label']=$m->nama;
                $mapelOfLokal[$l->id][]=$mdata;
            }
        }
        return collect($mapelOfLokal);
    }


    //membentuk Array ['id_mapel'=>'nama_mapel']
    public function buildMaPelList()
    {
        $mapel = $this->getMapelDariGuru();
        $listMapel = $mapel->pluck('nama','id');
        $listMapel = $listMapel->prepend('Mata Pelajaran',0);
        return $listMapel;
    }

    public function buildPostOfSiswaCollection()
    {
        $lokal = $this->user->siswa->lokal;
        $lokal->load('postMateri.mataPelajaranLokalGuru.mataPelajaran','kelas');
        $po =[];
        foreach ($lokal as $l) {
            $pol = $l->postMateri;
            $kelas = $l->kelas->kelas;
            $lok = $l->nama;
            foreach ($pol as $p) {
                $p->labelKelas = $kelas." ".$lok;
                $po[]=$p;
            }
        }
        return collect($po);
    }


    /*return $lokalDariMapel=
    [
        ['id_mapel'=>
            [
                ['idlokal']=>1,
                ['label']=>'X IPA1'
            ],
            [
                ['idlokal']=>1,
                ['label']=>'X IPA1'
            ]
        ],
        [
        ],
    ]*/
    public function buildLokalofMapelCollection()
    {
        $mapel = $this->getMapelDariGuru();
        $listLokal = $this->buildLokalList();
        $mapelGrup = $mapel->groupBy('id');
        $lokalDariMapel=[];
        foreach ($mapelGrup as $mg=>$lokal) {
            $lokalDariMapel[$mg]=[];
            foreach ($lokal as $lokalnya) {
                $isiKelas = [];
                $isiKelas['id_lokal']=$lokalnya->pivot->id_lokal;
                $isiKelas['label']=$listLokal[$lokalnya->pivot->id_lokal];
                $lokalDariMapel[$mg][]=$isiKelas;
            }
        }
        $lokalDariMapel = collect($lokalDariMapel);
        return $lokalDariMapel;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function setDataView($role)
    {
        $po=null;
        switch ($role) {
            case 'guru':
                $po = $this->user->guru->postMateri;
                $po->load('mataPelajaranLokalGuru.lokal.kelas','mataPelajaranLokalGuru.mataPelajaran');
                $listMapel = $this->buildMaPelList();
                $idLokal =[];
                $listLokal = $this->buildLokalList();
                $lokalDariMapel = $this->buildLokalofMapelCollection();
                $lokalDariMapelJSON = $lokalDariMapel->toJSON();
                $data = compact('po','listMapel','listLokal','lokalDariMapelJSON');
                break;
            case 'siswa':
                $po = $this->buildPostOfSiswaCollection();
                $listLokal = $this->buildLokalListSiswa();
                $mapelDariLokal = $this->buildMapelOfLokalCollection();
                $mapelDariLokalJSON = $mapelDariLokal->toJSON();
                $data = compact('po','listLokal','mapelDariLokalJSON');
            break;
            
            default:
                $fn=null;
                break;
        }
        return $data;
    }
    public function setDataViewSearch($role, Request $r)
    {
        $mp = MapelLokalGuru::with('postMateri','lokal.kelas')->where('mapel_id',$r->idmapel)->where('id_lokal',$r->idlokal)->get();
        $po=[];
        foreach ($mp as $m) {
            $materi = $m->postMateri;
            $lokal = $m->lokal->nama;
            $kelas = $m->lokal->kelas->kelas;
            foreach ($materi as $mo) {
                $mo->labelKelas = $kelas." ".$lokal;
                $po[]=$mo;
            }
        }
        $po = collect($po);
        switch ($role) {
            case 'guru':
                $listMapel = $this->buildMaPelList();
                $idLokal =[];
                $listLokal = $this->buildLokalList();
                $lokalDariMapel = $this->buildLokalofMapelCollection();
                $lokalDariMapelJSON = $lokalDariMapel->toJSON();
                $data = compact('po','listMapel','listLokal','lokalDariMapelJSON');
                break;
            case 'siswa':
                $listLokal = $this->buildLokalListSiswa();
                $mapelDariLokal = $this->buildMapelOfLokalCollection();
                $mapelDariLokalJSON = $mapelDariLokal->toJSON();
                $data = compact('po','listLokal','mapelDariLokalJSON');
            break;
            
            default:
                $fn=null;
                break;
        }
        return $data;
    }
    public function create()
    {
        $listMapel = $this->buildMaPelList();
        $lokalDariMapel = $this->buildLokalofMapelCollection();
        $lokalDariMapelJSON = $lokalDariMapel->toJSON();
        return view ('elearning.create',compact('listMapel','lokalDariMapelJSON'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriRequest $request)
    {
        $tanggal = DateCarbon::now();
        $judul=$request->judul;
        $isi = $request->isi;
        $idlokal=$request->idlokal;
        $idmapel = $request->idmapel;
        $idguru = $this->user->guru->id;
        $namaGuru = $this->user->guru->nama;

        $mapelLokalGuru = MapelLokalGuru::where('id_lokal',$idlokal)->where('mapel_id',$idmapel)->where('guru_id',$idguru)->first();
        $idml = $mapelLokalGuru->id;

        $post = new PostKelasOnline();
        $post->judul = $judul;
        $post->tanggal=$tanggal;
        $post->isi = $isi;
        $post->id_mapel_lokal = $idml;
        //return dd($idml);
        $post->save();
        $idpost=$post->id;

        $link = 'elearning/'.$idpost;

        $notifikasi = new Notifikasi();
        $notifikasi->pesan = $namaGuru.' mempublikasikan materi baru "'.$judul.'"';
        $notifikasi->link = $link;
        $siswa = Lokal::find($idlokal)->siswa;
        Notification::send($siswa,$notifikasi);

        return redirect('/elearning')->with('sukses','Posting berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PostKelasOnline::find($id);
        $saya = $this->saya;
        $user = $this->user;
        $data->load('komentar.user.guru','komentar.user.siswa');
        //Fcreturn dd($saya);
        return view('elearning.'.$this->role.'show',compact('data','id','saya','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = PostKelasOnline::find($id);
        $post->load('mataPelajaranLokalGuru');        
        $listMapel = $this->buildMaPelList();
        $lokalDariMapel = $this->buildLokalofMapelCollection();
        $lokalDariMapelJSON = $lokalDariMapel->toJSON();

        //membatasai hanya lokal dari mata pelajaran yg terselect
        $selectLokal = collect($lokalDariMapel[$post->mataPelajaranLokalGuru->mapel_id]);
        $selectLokal = $selectLokal->pluck('label','id_lokal');
        return view ('elearning.edit',compact('listMapel','lokalDariMapelJSON','post','selectLokal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MateriRequest $request, $id)
    {
        $judul=$request->judul;
        $isi = $request->isi;
        $idlokal=$request->idlokal;
        $idmapel = $request->idmapel;
        $idguru = $this->user->guru->id;

        $mapelLokalGuru = MapelLokalGuru::where('id_lokal',$idlokal)->where('mapel_id',$idmapel)->where('guru_id',$idguru)->first();
        $idml = $mapelLokalGuru->id;

        $post = PostKelasOnline::find($id);
        $post->judul = $judul;
        $post->isi = $isi;
        $post->id_mapel_lokal = $idml;
        $post->save();
        return redirect('/elearning')->with('edit_sukses','Posting telah disunting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostKelasOnline::destroy($id);
        return redirect('elearning')->with('sukses','Materi telah dihapus');
    }

    public function isPemateri($idpos,$idpemateri)
    {
        $post = PostKelasOnline::find($idpos);
        //$id_user = $post->user->id;
        return $id_user == $idpemateri;
    }

    public function getGuruPemateri(PostKelasOnline $post)
    {
        $post->load('mataPelajaranLokalGuru.guru');
        $guru = $post->mataPelajaranLokalGuru->guru;
        return $guru;
    }

    public function postKomen(Request $r, $id)
    {
        $komentar = new KomentarMateri();
        $komentar->komentar = $r->komentar;
        $komentar->users_id = $this->user->id;
        $komentar->materi_id = $id;
        $komentar->save();
        //cek komen sebelumnya;
        $post = PostKelasOnline::find($id);
        $komenEksis = $post->komentar->load('user');
        $adaKomen = $komenEksis->count()>0?true:false;
        $komentator = $this->user->guru==null?$this->user->siswa->nama:$this->user->guru->nama;
        $link = "elearning/".$id."#komentar".$komentar->id;
        $judul = $post->judul;
        if($adaKomen && $this->user->role!='guru')
        {
            $userList = [];
            foreach($komenEksis as $ke)
            {
                $userList[]=$ke->user;
            }
            $userList = collect($userList);
            $filteredUserList = $userList->where('id','!=',$this->user->id)->where('role','siswa');
            $siswaToNotify = [];//membuat array untuk liswa siswa yang akan dikasih notofikasi kalau ada yang komen
            foreach($filteredUserList as $f)
            {
                $siswaToNotify[]=$f->siswa;
            }
            $siswaToNotify = collect($siswaToNotify);
            $notif = new Notifikasi();
            $notif->pesan = $komentator." mengomentari ".$judul;
            $notif->link = $link;

            $notifPemateri = new Notifikasi();
            $notifPemateri->pesan = $komentator." mengomentari postingan anda";
            $notifPemateri->link=$link;
            Notification::send($siswaToNotify,$notif);
            $guru = $this->getGuruPemateri($post);
            $guru->notify($notifPemateri);
        }
        else if ($adaKomen && $this->user->role =='guru')
        {
            $userList = [];
            foreach($komenEksis as $ke)
            {
                $userList[]=$ke->user;
            }
            $userList = collect($userList);
            $filteredUserList = $userList->where('id','!=',$this->user->id)->where('role','siswa');
            $siswaToNotify = [];//membuat array untuk liswa siswa yang akan dikasih notofikasi kalau ada yang komen
            foreach($filteredUserList as $f)
            {
                $siswaToNotify[]=$f->siswa;
            }
            $siswaToNotify = collect($siswaToNotify);
            $notif = new Notifikasi();
            $notif->pesan = $komentator." mengomentari ".$judul;
            $notif->link = $link;
            Notification::send($siswaToNotify,$notif);
        }
        else if(!$adaKomen)
        {
            $notifPemateri = new Notifikasi();
            $notifPemateri->pesan = $komentator." mengomentari postingan anda";
            $notifPemateri->link=$link;
            $guru = $this->getGuruPemateri($post);
            $guru->notify($notifPemateri);
        }
        return redirect('/elearning/'.$id.'#komentar'.$komentar->id)->with('edit_sukses','Komentar telah dikirim');

    }
    public function replyKomen(Request $r, $id)
    {
        $komentar = new ReplyKomentarMateri();
        $komentar->komentar = $r->replykomentar;
        $komentar->komen_materi_id = $id;
        $komentar->user_id = $this->user->id;
        $komentar->save();
        //return dd($komentar->komentarnya->materi);
        $idreturn = $komentar->komentarnya->materi->id;
        return redirect('/elearning/'.$idreturn.'#reply'.$komentar->id)->with('edit_sukses','Balasan komentar telah dikirim');

    }
    public function getPosts(Request $r)
    {
        $data = $this->setDataViewSearch($this->role,$r);
        return view('elearning.index'.$this->role,$data);
    }
}
