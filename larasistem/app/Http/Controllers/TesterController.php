<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;

use SIAStar\Http\Requests;
use SIAStar\User;
use Excel;
use PDF;
use SIAStar\FormNilai;
use SIAStar\LokalSiswa;
class TesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idlokal=12;
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
        $finallRecord = collect($finallRecord)->sortByDesc('rerataTotal');
        $q = $finallRecord->where('id_siswa',5)->first();
        return dd($finallRecord);
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
    public function getIP(Request $r)
    {
        return dd($r->ip());
    }
    public function kosongin(Request $tabel)
    {
        $ok = "SIAStar\\".$tabel->p;
        $t = $ok::truncate();
        
    }
    public function tespdf(Request $r)
    {
       /* $user = User::paginate(20);
        $roleTextView ='Semua Role';
        //return dd(Auth::user()->role);
        $pdf = PDF::loadView('home',compact('user','roleTextView'));
        $pdf->stream('tespdf.pdf');*/
        //return dd('pantek');

        //$data="kentu";
        $pdf = PDF::loadView('wc');
        return $pdf->download('homexe.pdf');
        
    }
    public function kentu(Request $r){
        $pdf = PDF::loadHTML('<h1>Matius</h1>');
return $pdf->stream('matius.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r, $id)
    {
        $this->$id($r);
    }
    public function tesxl(Request $r)
    {
        $data = User::all();

        Excel::create('Filename', function($excel) use($data) {

            $excel->sheet('Sheetname', function($sheet) use($data) {

                $sheet->fromArray($data);

            });

        })->export('xls');
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
