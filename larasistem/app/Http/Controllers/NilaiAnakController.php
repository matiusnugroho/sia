<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use SIAStar\FormNilai;
use SIAStar\MataPelajaran;
use SIAStar\Guru;
use SIAStar\Lokal;
use SIAStar\Nilai;
use SIAStar\LokalSiswa;
use SIAStar\MapelLokalGuru;
use SIAStar\Siswa;

class NilaiAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $aktor;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->getUserData();
            return $next($request);
        });
    }
    public function getUserData()
    {
        $user = Auth::user();
        $this->aktor = $user->ortu;
        $this->aktor->load('anak');
    }
    public function iniAnakku($id)
    {
        $anak = $this->aktor->anak->where('id',$id)->first();
        return !is_null($anak);
    }
    public function index()
    {
        $anak = $this->aktor->anak->load('lokal.kelas');
        $lokalSiswa;
        foreach ($anak as $a) {
            foreach ($a->lokal as $lokal) {
                $lokalSiswa[$a->id][$lokal->id]=$lokal->kelas->kelas." ".$lokal->nama." Semester ".$lokal->semester;
            }
        }
        //return dd([$anak,$lokalSiswa]);
        return view('ortu.anakku.indexnilai',compact('anak','lokalSiswa'));
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
        //$ortu = 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $anak = $this->aktor->anak->where('id',$id)->first();
        // return dd(!is_null($anak));
        if(method_exists($this, $id))
        {
            return $this->$id();
        }
        else
        {
            return view('errors.takboleh',['pesan'=>'sistem tidak mengenali request anda']);
        }
    }

    public function pilih()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rekapLokal($idlokal)
    {
        $formNilai = FormNilai::whereHas('mataPelajaranLokalGuru',function($q)use ($idlokal){
            $q->where('id_lokal',$idlokal);
        })->whereHas('nilai')->get();
        $formNilai->load('nilai');
        
        $lokalSiswa = LokalSiswa::where('id_lokal',$idlokal)->get();
        $datanilai=[];
        $formNilai=$formNilai->groupBy('id_mapel_lokal');
        foreach ($formNilai as $idmp => $form) {
            foreach ($form as $fn) {
                $nilai = $fn->nilai;
                foreach ($nilai as $n) {
                    $datanilai[$n->siswa_id][$idmp][$fn->id]=$n->nilai;
                }

            }
        }
        $finallRecord=[];
        foreach ($datanilai as $idSiswa=>$mlg) {
            $nMapel=0;
            $totalRerata=0;
            $finallRecord[$idSiswa]['id_siswa']=$idSiswa;
            foreach ($mlg as $idMLG=>$nilai) {
                $n=0;
                $total=0;
                $nMapel++;
                foreach ($nilai as $nilainya) {
                    $n++;                    
                    $total=$total+$nilainya;
                    $rerata = $total/$n;
                    $totalRerata=$totalRerata+$rerata;
                    $rerataSemua = $totalRerata/$nMapel;
                    $finallRecord[$idSiswa]['subjek'][$idMLG]['n']=$n;
                    $finallRecord[$idSiswa]['subjek'][$idMLG]['nilai']=$nilai;
                    $finallRecord[$idSiswa]['subjek'][$idMLG]['total']=$total;
                    $finallRecord[$idSiswa]['subjek'][$idMLG]['rerata']=$rerata;
                    $finallRecord[$idSiswa]['jumlahSubjek']=$nMapel;
                }
            }
        }
        foreach ($finallRecord as $idSiswa=>$isi) {
            $finallRecord[$idSiswa]['totalRerata']=0;
            foreach ($isi['subjek'] as $subjek) {
                $finallRecord[$idSiswa]['totalRerata']+=$subjek['rerata'];
            }
            $finallRecord[$idSiswa]['rerataTotal']=$finallRecord[$idSiswa]['totalRerata']/$finallRecord[$idSiswa]['jumlahSubjek'];
        }
        $rankedFinallRecord = collect($finallRecord)->sortByDesc('rerataTotal');
        return $rankedFinallRecord;
    }
    public function buildLokalListSiswa(Siswa $siswa)
    {
        $lokal = $siswa->lokal;
        $lokal->load('kelas');
        $listLokal[0]="Pilih Lokal";
        //dapatkan nama kelasnya
        foreach ($lokal as $l) {
            $listLokal[$l->id]=$l->kelas->kelas." ".$l->nama." Semester ".$l->semester;
        }
        return $listLokal;

    }
    public function buildMapelOfLokalCollection(Siswa $siswa)
    {
        $lokal = $siswa->lokal;//->groupBy('id_kelas');
        //return dd($lokal);
        $mapelOfLokal=[];
        $lokal->load('mataPelajaran');
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

    public function buildRapor($id_siswa,$idlokal)
    {
        $dataRekap = $this->rekapLokal($idlokal);
        $listLokal = $this->buildLokalListSiswa(Siswa::find($id_siswa));
        $lokal = Lokal::with('kelas')->find($idlokal);
        if($dataRekap->count()>0)
        {
            $rekapSaya = $dataRekap->where('id_siswa',$id_siswa)->first();
            $dataNilai = $rekapSaya['subjek'];
            $listIdMapelLokal=[];
            foreach ($dataNilai as $key => $value) {
                $listIdMapelLokal[]=$key;
            }
            $mapelLokal = MapelLokalGuru::with('mataPelajaran')->whereIn('id',$listIdMapelLokal)->get();
            $datarapor = [];
            $dataRadar=[];
            $cjdataLabels=[];
            $cjdatas=[];

            foreach ($mapelLokal as $mapellokal) {
                $data['label']=$mapellokal->mataPelajaran->nama;
                $data['nilai']=$dataNilai[$mapellokal->id]['rerata'];
                $datarapor[] = $data;
                $dataradar['axis']=$mapellokal->mataPelajaran->nama;
                $dataradar['value']=$dataNilai[$mapellokal->id]['rerata'];
                $dataRadar[]=$dataradar;
                $cjdataLabels[]=$mapellokal->mataPelajaran->nama;
                $cjdatas[]=$dataNilai[$mapellokal->id]['rerata'];
            }
            $dataRadarset=[];
            $dataRadarset[]=$dataRadar;
            $cjdataLabelsJson=collect($cjdataLabels)->toJSON();
            $cjdatasJson = collect($cjdatas)->toJSON();
            $drajson = collect($dataRadarset)->toJSON();
            $reratasemua = $rekapSaya['rerataTotal'];
            $penentuPeringkat = $dataRekap->toArray();
            $peringkatKelas = array_search($id_siswa, array_keys($penentuPeringkat))+1;
            $listSiswa = LokalSiswa::where('id_lokal',$idlokal)->get();
            $jmlSiswa=$listSiswa->count();
        }
        else
        {
            $datarapor=[];
            $reratasemua=null;
            $cjdatasJson=null;
            $cjdataLabelsJson=null;
            $peringkatKelas = null;
            $jmlSiswa=null;
        }
        return compact('datarapor','reratasemua','lokal','cjdataLabelsJson','cjdatasJson','peringkatKelas','jmlSiswa','listLokal','id_siswa');
    }
    public function buildRekapAll($id_siswa,$idlokal)
    {
        $data = FormNilai::with(
            [
                'nilai'=>function($queryNilai) use ($id_siswa){
                    $queryNilai->where('siswa_id','=',$id_siswa);
                },
                'mataPelajaranLokalGuru.mataPelajaran',
                'mataPelajaranLokalGuru.lokal.kelas'
            ])->whereHas('mataPelajaranLokalGuru',function($queryMLG) use ($idlokal) {
                $queryMLG->where('id_lokal','=',$idlokal);
            })->get();
        $listLokal = $this->buildLokalListSiswa(Siswa::find($id_siswa));
        $mapelDariLokal = $this->buildMapelOfLokalCollection(Siswa::find($id_siswa));
        $mapelDariLokalJSON = $mapelDariLokal->toJSON();
        //return dd($data);
        return compact('data','listLokal','mapelDariLokalJSON','id_siswa');
    }
    public function buildRekap($id_siswa,$idlokal,$idmapel)
    {
        $listLokal = $this->buildLokalListSiswa(Siswa::find($id_siswa));
        $mapelDariLokal = $this->buildMapelOfLokalCollection(Siswa::find($id_siswa));
        $mapelDariLokalJSON = $mapelDariLokal->toJSON();
        $lokal = Lokal::with('kelas')->find($idlokal);
        $mataPelajaran = MataPelajaran::find($idmapel);
        $formNilai = FormNilai::whereHas('mataPelajaranLokalGuru',function($q)use ($idlokal,$idmapel){
            $q->where('id_lokal',$idlokal)->where('mapel_id',$idmapel);
        })->whereHas('nilai',function($nilai) use($id_siswa) {
            $nilai->where('siswa_id',$id_siswa);
        })->get();
        $formNilai->load('mataPelajaranLokalGuru.lokal.kelas');
        $formNilai->load(['nilai'=>function($nilai) use ($id_siswa) {
            $nilai->where('siswa_id',$id_siswa);
        }]);
        $n=$formNilai->count();
        
        
        if(count($lokal)>0 && count($mataPelajaran)>0 && $n>0)
        {
            $totalnilai=0;
            $mapel = $mataPelajaran->nama;
            $namaKelas = $lokal->kelas->kelas." ".$lokal->nama;            
            $nilai=[];
            $dataChart=[];
            $dataChart['label']=[];
            $dataChart['data']=[];
            

            foreach ($formNilai as $fn) {
                $data=[];
                $nn = $fn->nilai[0]['nilai'];
                $data['id']=$fn->id;
                $data['judul']=$fn->judul;
                $dataChart['label'][]=$fn->judul;
                $data['nilai']=$nn;
                $dataChart['data'][]=$nn;
                $nilai[]=$data;
                $totalnilai=$totalnilai+$nn;
            }
            $dataChart = collect($dataChart)->toJSON();
            $rata = $totalnilai/$n;
        }
        else
        {
            $nilai=[];
            $rata=[];
            $dataChart = collect([])->toJSON();
            $namaKelas=null;
            $mapel=null;

        }
        return compact('listLokal','mapelDariLokalJSON','nilai','rata','dataChart','namaKelas','mapel','idlokal','idmapel','id_siswa');
    }
   public function rapor($id, $id_lokal)
   {
       if($this->iniAnakku($id))
       {
            $data = $this->buildRapor($id,$id_lokal);
            return view('ortu.anakku.rapor',$data);
       }
       return view('errors.takboleh',['pesan'=>"Anda tidak diperbolehkan melihat data nilai siswa yang bukan anak anda"]);
   }
   public function rekap($id, $id_lokal, $id_mapel=null)
   {
        if($this->iniAnakku($id)){
            if(is_null($id_mapel))
            {
                $data=$this->buildRekapAll($id,$id_lokal);
                return view('ortu.anakku.rekapall',$data);
            }
            else 
            {
                $data = $this->buildRekap($id,$id_lokal, $id_mapel);
                return view('ortu.anakku.rekap',$data);
            }
        }
       return view('errors.takboleh',['pesan'=>"Anda tidak diperbolehkan melihat data nilai siswa yang bukan anak anda"]);
   }
   public function getRapor(Request $r, $id)
   {
        $this->validate($r,['idlokal'=>'required'],['idlokal.required'=>"Pilih Lokal untuk dilihat"]);
        return redirect()->route('rapor-anak',['id'=>$id,'id_lokal'=>$r->idlokal]);
   }
   public function getRekap(Request $r, $id)
   {
        $this->validate($r,['idlokal'=>'required'],['idlokal.required'=>"Pilih Lokal untuk dilihat"]);
        return redirect()->route('rekap-anak',['id'=>$id,'id_lokal'=>$r->idlokal,'id_mapel'=>$r->idmapel]);
   }
}
