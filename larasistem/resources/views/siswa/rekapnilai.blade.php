@extends('siswa.index')
@section('additionstyle')
<link href="{{url('assets/css/plugins/footable/footable.standalone.min.css')}}" rel="stylesheet">
@endsection
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <h2>Rekap Nilai</h2>
</div>
<div class="wrapper wrapper-content">
{{-- <div class="col-lg-12"> --}}
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Pilih Rekap Nilai<small class="m-l-sm"></small></h5>
                </div>
                <div class="ibox-content p-md">
                    <div class="row m-b-sm p-md">
                    {!! Form::open(['url' => 'rekapnilai/laporan','method'=>'get', 'class' => 'form-inline']) !!}
                     <div class="form-group">
                    {!!Form::select('idlokal',$listLokal,['0'=>'Lokal'],['class'=>'input-sm form-control','id'=>'idlokal'])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::select('idmapel',["0"=>"Mata Pelajaran"],null,['class'=>'input-sm form-control','id'=>'idmapel'])!!}
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                    </div>

                    <div class="row m-b-sm p-md">
                        @if($fn->count()==0)
                            <h1>Tidak ada data rekap nilai yang bisa ditampilkan</h1>
                        @else
                        <h2>Daftar Blangko Nilai</h2>                
                        <table class="footable table table-hover">
                            <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Lokal</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Nilai</th>
                            
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($fn as $f)
                             <tr>
                                <td>{{$f->mataPelajaranLokalGuru->mataPelajaran->nama}}</td>
                                <td>{{$listLokal[$f->mataPelajaranLokalGuru->lokal->id]}}</td>
                                <td>{{$f->judul}}</td>
                                <td>{{$f->tanggal}}</td>
                                <td>{{$f->nilai}}</td>                      
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        {{-- </div> --}}
</div>

@endsection
@section('jsmore')
<script type="text/javascript">
    var listMapel = {!!$mapelDariLokalJSON!!}
    window.onload = function(){
        idlokal = document.getElementById('idlokal');
        idlokal.addEventListener('change',function(){setSelect(this.value,'idmapel')});
    }
    function setSelect(id,selectlokal) {
        listMapelSelect = listMapel[id];
        html="";
        mapelSelek = document.getElementById(selectlokal);
        for(i in listMapelSelect){
            html+="<option value='"+listMapelSelect[i].idmapel+"'>"+listMapelSelect[i].label+"</option>";
        }
        mapelSelek.innerHTML=html;
    }
</script>
<script src="{{url("assets/js/plugins/footable/footable.min.js")}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.footable').footable();

    });

</script>
@endsection