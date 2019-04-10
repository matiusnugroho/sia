@extends('guru.index')
@section('title')- Lihat Laporan Nilai @endsection
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
                {{-- <div class="ibox-title">
                    <h5>Pilih Rekap Nilai<small class="m-l-sm"></small></h5>
                </div> --}}
                <div class="ibox-content p-md">

                    <div class="row m-b-sm p-md">
                    {!! Form::open(['url' => 'rekapnilai/laporan','method'=>'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                    {!!Form::select('idmapel',$listMapel,['0'=>'Mata Pelajaran'],['class'=>'input-sm form-control','id'=>'idmapel'])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::select('idlokal',["0"=>"Lokal"],null,['class'=>'input-sm form-control','id'=>'lokalnya'])!!}
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        {{-- </div> --}}
</div>
@endsection
@section('jsmore')

<script type="text/javascript">
    var listLokal = {!!$lokalDariMapelJSON!!}
    window.onload = function(){
        mapel = document.getElementById('idmapel');
        mapel.addEventListener('change',function(){setSelect(this.value,'lokalnya')});
    }
    function setSelect(id,selectlokal) {
        lokal = listLokal[id];
        html="";
        lokalSelek = document.getElementById(selectlokal);
        for(i in lokal){
            html+="<option value='"+lokal[i].id_lokal+"'>"+lokal[i].label+"</option>";
        }
        lokalSelek.innerHTML=html;
    }
</script>
<script src="{{url("assets/js/plugins/footable/footable.min.js")}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.footable').footable(
            {
                "sorting": {
                    "enabled": true
                },
            });

    });

</script>
@endsection