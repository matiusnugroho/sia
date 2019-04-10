<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use SIAStar\FormNilai;
use SIAStar\MataPelajaran;
use SIAStar\Guru;
use SIAStar\Lokal;
use SIAStar\Nilai;
use SIAStar\LokalSiswa;
use SIAStar\MapelLokalGuru;
use Auth;
use PDF;
use Excel;
use Carbon\Carbon as DateCarbon;
use Hash;

class RekapNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    private $role;
    private $id;//nis atau nim
    private $uid;//user id
    private $aktor; //guru/siswa 
    public function __construct()
    {
        //$this->middleware('SIAStar\Http\Middleware\AksesRekapNilai');
        $this->middleware('BukanOrtuAdmin');
        $this->middleware(function ($request, $next) {
            $this->getUserData();
            return $next($request);
        });
    }
    public function index()
    {
        $data = $this->setDataView($this->role);
        return view($this->role.'.rekapnilai', $data);
       
    }

    public function getUserData()
    {
        $user = Auth::user();
        $this->user = $user;
        $this->role = $user->role;
        $this->id = $user->guru==null?$user->siswa->nis:$user->guru->nip;
        $this->uid = $user->{$user->role}->id;
        $this->aktor = $user->{$user->role};
    }

    public function getMapelDariGuru()
    {
        $guru = $this->user->guru;
        $mapel = $guru->mataPelajaran;
        return $mapel;
    }


    //membentuk Array ['id_mapel'=>'nama_mapel']
    public function buildMaPelList()
    {
        $mapel = $this->getMapelDariGuru();
        $listMapel = $mapel->pluck('nama','id');
        $listMapel = $listMapel->prepend('Mata Pelajaran',0);
        return $listMapel;
    }

    public function buildLokalList()
    {
        $mapel = $this->getMapelDariGuru();
        $idLokal =[];
        $listLokal=[];
        //ambil id lokal dari mapel untuk diambil lokal mana saja yang termasuk ke dalam mapel itu
        foreach ($mapel as $m) {
            $idLokal[]=$m->pivot->id_lokal;
        }
        //ambil Lokal dalam satu query yang id-nya ada ditabel
        $lokal = Lokal::whereIn('id',$idLokal)->get();
        $lokal->load('kelas');
        //dapatkan nama kelasnya
        foreach ($lokal as $l) {
            $listLokal[$l->id]=$l->kelas->kelas." ".$l->nama." Semester ".$l->semester;
        }
        return $listLokal;
    }
    public function buildLokalListSiswa()
    {
        $siswa = $this->aktor;
        $lokal = $siswa->lokal;
        $lokal->load('kelas');
        $listLokal[0]="Pilih Lokal";
        //dapatkan nama kelasnya
        foreach ($lokal as $l) {
            $listLokal[$l->id]=$l->kelas->kelas." ".$l->nama." Semester ".$l->semester;
        }
        return $listLokal;

    }

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
    public function buildMapelOfLokalCollection()
    {
        $siswa = $this->user->siswa;
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

    public function setDataView($role)
    {
        $fn=null;
        switch ($role) {
            case 'guru':
                $fn = FormNilai::whereHas('mataPelajaranLokalGuru',function($mlg)
                    {
                        $mlg->where('guru_id','=',$this->uid);
                    })->get();
                $fn->load('mataPelajaranLokalGuru');
                $listMapel = $this->buildMaPelList();
                $idLokal =[];
                $listLokal = $this->buildLokalList();
                $lokalDariMapel = $this->buildLokalofMapelCollection();
                $lokalDariMapelJSON = $lokalDariMapel->toJSON();
                $data = compact('fn','listMapel','listLokal','lokalDariMapelJSON');
                break;
            case 'siswa':
                $siswa = $this->aktor;
                $siswa = $siswa->load('lokal.formNilai','lokal.kelas');
                $lokal = $siswa->lokal;
                $dataForm=[];
                $siswaid = $this->uid;
                
                foreach ($lokal as $lo) 
                {
                    $fn = $lo->formNilai;
                    if(count($fn)>0)
                    {
                        foreach ($fn as $form) 
                        {
                            $nilai = Nilai::where('siswa_id',$siswaid)->where('id_form_nilai',$form->id)->first();
                            $form->labelKelas = $lo->kelas->kelas." ".$lo->nama;
                            $form->nilai = $nilai->nilai;
                            $dataForm[]=$form;
                        }
                    }
                }
                $fn=collect($dataForm);
                //return dd($fn);
                $listLokal = $this->buildLokalListSiswa();
                $mapelDariLokal = $this->buildMapelOfLokalCollection();
                $mapelDariLokalJSON = $mapelDariLokal->toJSON();
                $data = compact('fn','listLokal','mapelDariLokalJSON');

            break;
            
            default:
                $fn=null;
                $data = compact('fn');
                break;
        }
        return $data;
    }

    /*Membangun variable yang akan di bawa ke view Report per kelas*/
    public function createDataViewPackageReportPerKelas($idlokal, $idmapel)
    {
        $formNilai = FormNilai::whereHas('mataPelajaranLokalGuru',function($mlg) use ($idlokal,$idmapel)
                    {
                        $mlg->where('id_lokal','=',$idlokal)->where('mapel_id',$idmapel)->where('guru_id','=',$this->uid);
                    })->get();
        $lokal = Lokal::find($idlokal);
        $listMapel = $this->buildMaPelList();
        $listLokal = $this->buildLokalList();
        $lokalDariMapel = $this->buildLokalofMapelCollection();
        $lokalDariMapelJSON = $lokalDariMapel->toJSON();

        if ($formNilai->count()>0 && $lokal->count()>0)
        {
            $formNilai->load('nilai.siswa');
            $lokal->load('kelas');
            //return dd($formNilai);
            $mapelnamanya = MataPelajaran::find($idmapel)->nama;
            $namaKelas = $lokal->kelas->kelas." ".$lokal->nama;
    
            $kolom=[];
            $kolompertama['rank']="Ranking";
            $kolompertama['nis']="NIS";
            $kolompertama['nama']="Nama";
            foreach ($formNilai as $fn) {
                $kolompertama['nilai']['nilai'.$fn->id]=$fn->judul;
            }
            $kolompertama['rerata']="Rata-Rata";
            $totalRataKelas=0;
            $rank=0;
            /*membentuk kolom 
            {
                "58948":{"nis":"58948","nama":"Okta Kacung Rajata","nilai":{"nilai12":99,"nilai14":100,"nilai15":98},"rerata":99,"rank":1}
            }*/
            foreach ($formNilai as $fn) {
                $n = count($formNilai);
                foreach ($fn->nilai as $nilai) {
                    $totalnilai=0;
                    $kolom[$nilai->siswa->nis]['nis']=$nilai->siswa->nis;
                    $kolom[$nilai->siswa->nis]['nama']=$nilai->siswa->nama;
                    $kolom[$nilai->siswa->nis]['nilai']['nilai'.$fn->id]=$nilai->nilai;
                    //dipisahkan biar dapat nilai yang sesuai
                    $kolomNilai[$nilai->siswa->nis]['nilai'.$fn->id]=$nilai->nilai;
                    $datanilai=$kolomNilai[$nilai->siswa->nis];
                    foreach ($datanilai as $key => $value) {
                        $totalnilai+=$value;
                    }
                    $rata = $totalnilai/$n;
                    $kolom[$nilai->siswa->nis]['rerata']=$rata;
                    
                }
            }
    
            $kolom = collect($kolom);
            foreach ($kolom as $d) {
                $totalRataKelas+=$d['rerata'];
            }
            $nsiswa = $kolom->count();
            if($nsiswa == 0) {$rataKelas=0;}
            else{
                $rataKelas = $totalRataKelas/$nsiswa;
            }
            
            
            $kolom=$kolom->sortByDesc('rerata');//ranking dari rata2 tertinggi       
            
            foreach ($kolom as $key => $value) 
            {
                $row = $kolom[$key];
                $kolom[$key] = array_add($row,'rank',++$rank);
            }
            
            $diatasRata = $kolom->where('rerata','>',$rataKelas)->count();
            $dibawahRata = $kolom->where('rerata','<',$rataKelas)->count();
        }
        else
        {
            $diatasRata = 0;
            $dibawahRata = 0;
            $kolom=[];
            $kolompertama=[];
            $mapelnamanya=null;
            $namaKelas=null;
            $rataKelas=0;
        }

        //return dd($kolompertama);

        return compact('kolom','kolompertama','listMapel','lokalDariMapelJSON','mapelnamanya','namaKelas','idlokal','idmapel','rataKelas','diatasRata','dibawahRata');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = $this->role;
        return $this->{$role.'create'}();       
    }

    public function guruCreate()
    {
        $data = $this->setDataView($this->role);
        return view($this->role.'.createrekap', $data);
    }
    public function siswacreate()
    {
        return view('errors.404');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_guru = $this->user->guru->id;
        $id_mapel = $request->idmapelcreate;
        $id_lokal = $request->idlokalcreate;
        $judul = $request->judul;
        $tgl = DateCarbon::now();
        $mapelLokalGuru = MapelLokalGuru::where('mapel_id',$id_mapel)->where('id_lokal',$id_lokal)->where('guru_id',$id_guru)->first();
        $idmlg = $mapelLokalGuru->id;

        $fn = $formnNilai = FormNilai::create([
                'judul'=>$judul,
                'id_mapel_lokal'=>$idmlg,
                'tanggal'=>$tgl
            ]);
        $idFormNilai = $fn->id;

        //mengambil siswa yang berelasi dengan mata pelajaran dan lokal tersebut
        $idSiswa = LokalSiswa::select('siswa_id')->where('id_lokal',$id_lokal)->get();
        $idSiswa = $idSiswa->pluck('siswa_id')->toArray();

        //ketika pertama membuat form nilai, otomasi memberi nilai 0 kepada siswa yang berelasi dengan mata pelajaran dan lokal tersebut
        $recordNilaiDefault = [];
        foreach ($idSiswa as $ids) {
            $data=[];
            $data['siswa_id']=$ids;
            $data['nilai']=0;
            $data['id_form_nilai']=$idFormNilai;
            $recordNilaiDefault[]=$data;
        }

        Nilai::insert($recordNilaiDefault);
        return redirect('rekapnilai')->with('sukses','Blangko '.$judul.' telah dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formNilai = FormNilai::with('nilai.siswa')->findOrFail($id);
        $no=0;
        $nilai = $formNilai->nilai;
        $nilai = $nilai->sortByDesc('nilai');
        if($this->role!='guru') return view('errors.404');
        return view('guru.rekapnilaiperblangko',compact('formNilai','no','nilai','id'));
    }

    public function excel($id)
    {
        $formNilai = FormNilai::with('nilai.siswa')->find($id);
        $no=0;
        $nilai = $formNilai->nilai;
        //return $nilai;
        $fileName = 'rekap_nilai_'.$formNilai->judul;
        $data=[];
        $firstRow =[];
        $firstRow[]="NIS";
        $firstRow[]="Nama";
        $firstRow[]="Nilai";
        $data[]=$firstRow;
        foreach ($nilai as $n) {
            $fill=[];
            $fill['nis']=$n->siswa->nis;
            $fill['nama']=$n->siswa->nama;
            $fill['nilai']=$n->nilai;
            $data[]=$fill;
        }
        //return $data;
        Excel::create($fileName, function($excel) use($data) {

            $excel->sheet('Nilai', function($sheet) use($data) {

                $sheet->fromArray($data);

            });

        })->export('xls');
    }

    public function pdf($id)
    {
        $formNilai = FormNilai::with('nilai.siswa')->findOrFail($id);
        $no=0;
        $nilai = $formNilai->nilai;
        $fileName = 'rekap_nilai_'.$formNilai->judul;
        //$pdf = PDF::loadHTML('haaaai');
        $pdf = PDF::loadView('guru.rekapnilaiperblangkopdf',compact('formNilai','no','nilai','id'));
        return $pdf->download($fileName);
    }

    /**
     * Show thefo form for editing the specified resource.
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

    public function editNilai(Request $request, $id)
    {
        $inid=[];
        $kandidatId = $request->nilaibaru;
        foreach ($kandidatId as $key => $value) {
            $inid[]=$key;
        }
        $nilai = Nilai::where('id_form_nilai',$id)->whereIn('id',$inid)->get();
        foreach ($nilai as $nilaibaru) {
            $nilaibaru->nilai = $request->nilaibaru[$nilaibaru->id];
            $nilaibaru->save();
        }
        return redirect('rekapnilai/'.$id);
    }
    /*Menampilkan laporan nilai route : rekapnilai/laporan?*/
    public function handleReportNilai(Request $request)
    {
        if ($request->idlokal!==null && $request->idmapel!=null)
        {
            return $this->{'renderLaporan'.$this->role}($request->idlokal, $request->idmapel);
        }
        else
        {
            return $this->{'laporan'.$this->role}();
        }
    }
    public function handleRapor(Request $request)
    {
        if ($request->idlokalRapor!==null)
        {
            return $this->{'renderrapor'.$this->role}($request->idlokalRapor);
        }
        else
        {
            return $this->{'laporan'.$this->role}();
        }
    }

    public function laporanGuru()
    {
        $listMapel = $this->buildMaPelList();
        $listLokal = $this->buildLokalList();
        $lokalDariMapel = $this->buildLokalofMapelCollection();
        $lokalDariMapelJSON = $lokalDariMapel->toJSON();
        $data = compact('listMapel','listLokal','lokalDariMapel','lokalDariMapelJSON');
        return view('guru.laporanpilih',$data);
    }
    public function laporanSiswa()
    {
        $listLokal = $this->buildLokalListSiswa();
        $mapelDariLokal = $this->buildMapelOfLokalCollection();
        $mapelDariLokalJSON = $mapelDariLokal->toJSON();
        $data = compact('listLokal','mapelDariLokalJSON');
        return view('siswa.laporanpilih',$data);
    }
    public function buildDataViewSiswa($idlokal,$idmapel)
    {
        $listLokal = $this->buildLokalListSiswa();
        $lokal = Lokal::with('kelas')->find($idlokal);
        $mataPelajaran = MataPelajaran::find($idmapel);
        $mapelDariLokal = $this->buildMapelOfLokalCollection();
        $mapelDariLokalJSON = $mapelDariLokal->toJSON();
        $formNilai = FormNilai::whereHas('mataPelajaranLokalGuru',function($q)use ($idlokal,$idmapel){
            $q->where('id_lokal',$idlokal)->where('mapel_id',$idmapel);
        })->whereHas('nilai',function($nilai){
            $nilai->where('siswa_id',$this->uid);
        })->get();
        $formNilai->load('mataPelajaranLokalGuru.lokal.kelas');
        $formNilai->load(['nilai'=>function($nilai){
            $nilai->where('siswa_id',$this->uid);
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
        return compact('listLokal','mapelDariLokalJSON','nilai','rata','dataChart','namaKelas','mapel','idlokal','idmapel');
    }
    public function renderLaporanGuru($idlokal,$idmapel)
    {
        $data = $this->createDataViewPackageReportPerKelas($idlokal,$idmapel);
        return view ('guru.laporan',$data);
    }

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

    public function buildRapor($idlokal)
    {
        $dataRekap = $this->rekapLokal($idlokal);
        $listLokal = $this->buildLokalListSiswa();
        //return dd($listLokal);
        $lokal = Lokal::with('kelas')->find($idlokal);
        if($dataRekap->count()>0)
        {
            $rekapSaya = $dataRekap->where('id_siswa',$this->uid)->first();
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
            $peringkatKelas = array_search($this->uid, array_keys($penentuPeringkat))+1;
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
        return compact('datarapor','reratasemua','listLokal','lokal','cjdataLabelsJson','cjdatasJson','peringkatKelas','jmlSiswa');
    }

    public function renderLaporanSiswa($idlokal,$idmapel)
    {
        $data = $this->buildDataViewSiswa($idlokal,$idmapel);
        return view ('siswa.laporan',$data);
    }
    public function renderraporsiswa($idlokal)
    {
        $lokalSiswa = LokalSiswa::where([['id_lokal',$idlokal],['siswa_id',$this->uid]]);
        if($lokalSiswa->count()>0)
        {
            $data = $this->buildRapor($idlokal);
            return view('siswa.rapor',$data);
        }
        else
        {
            return response("",404);
        }
    }
    public function renderraporPDFsiswa($idlokal)
    {
        $lokalSiswa = LokalSiswa::where([['id_lokal',$idlokal],['siswa_id',$this->uid]]);
        if($lokalSiswa->count()>0)
        {
            $data = $this->buildRapor($idlokal);
            $fileName="rapor-".Hash::make(DateCarbon::now());
            //return $pdf=PDF::loadView('siswa.raporPDF',$data)->download($fileName);
            return view('siswa.raporPDF',$data);
        }
        else
        {
            return response("",404);
        }
    }
    public function laporanNilaiPDF(Request $request)
    {
        $data = $this->createDataViewPackageReportPerKelas($request->idlokalPDF, $request->idmapelPDF);
        $now = DateCarbon::now();
        $fileName = $data['mapelnamanya']."-".$data['namaKelas']."-".$now;
        $pdf = PDF::loadView('guru.laporanpdf',$data);
        return $data;
        //return $pdf->download($fileName);
    }
    public function raporPDF(Request $request)
    {
        if ($request->idlokalRapor!==null)
        {
            return $this->{'renderraporPDF'.$this->role}($request->idlokalRapor);
        }
    }
}