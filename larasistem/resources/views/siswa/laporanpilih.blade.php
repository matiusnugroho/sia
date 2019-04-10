@extends('siswa.index')
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
                <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1">Semua Mata Pelajaran</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Per Mata Pelajaran</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                   <div class="row m-b-sm p-md">
                                    {!! Form::open(['url' => 'rekapnilai/rapor','method'=>'get', 'class' => 'form-inline']) !!}
                                    <div class="form-group">
                                    {!!Form::select('idlokalRapor',$listLokal,['0'=>'Lokal'],['class'=>'input-sm form-control'])!!}
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
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
                                </div>
                            </div>
                        </div>


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
        listMapelSelek = listMapel[id];
        console.log(id);
        html="";
        mapelSelek = document.getElementById(selectlokal);
        for(i in listMapelSelek){
            html+="<option value='"+listMapelSelek[i].idmapel+"'>"+listMapelSelek[i].label+"</option>";
        }
        mapelSelek.innerHTML=html;
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