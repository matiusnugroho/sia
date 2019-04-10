@extends('guru.index')
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
                     {!! Form::open(['route' => 'rekapnilai.store','method'=>'post', 'class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                    <label class="col-sm-3 control-label">Lokal/MataPelajaran</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                {!!Form::select('idmapelcreate',$listMapel,0,['class'=>'input-sm form-control','id'=>'idmapelcreate'])!!}
                                            </div>
                                            <div class="col-md-6">
                                                {!!Form::select('idlokalcreate',["0"=>"Lokal"],null,['class'=>'input-sm form-control','id'=>'lokalnyacreate'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Judul Blangko</label>
                                        <div class="col-sm-9">
                                            {!!Form::text('judul',null,['class'=>'input-sm form-control'])!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-ok"></i>OK</button>
                                        </div>
                                    </div>
                                    {!!Form::close()!!}
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
        mapelcreate = document.getElementById('idmapelcreate');
        mapelcreate.addEventListener('change',function(){setSelect(this.value,'lokalnyacreate')});

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