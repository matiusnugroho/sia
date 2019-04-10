@extends('admin.index')
@section('title')- Lihat guru Mata Pelajaran @endsection
@section('additionstyle')
<link href="{{url('assets/css/plugins/footable/footable.standalone.min.css')}}" rel="stylesheet">
@endsection
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <h2>Guru Mata Pelajaran</h2>
    <h3>{{$infolokal->kelas->kelas." ".$infolokal->nama." ".$infolokal->jurusan->jurusan}}</h3>
</div>
<div class="wrapper wrapper-content">
{{-- <div class="col-lg-12"> --}}
            <div class="ibox float-e-margins">
                {{-- <div class="ibox-title">
                    <h5>Pilih Rekap Nilai<small class="m-l-sm"></small></h5>
                </div> --}}
                <div class="ibox-content p-md">

                    <div class="row m-b-sm p-md">
                    {!! Form::open(['route' => ['gurumatapelajaran.setgurusave',$infolokal->id],'method'=>'post', 'class' => 'form-horizontal']) !!}
                                <div class="form-group @if($errors->has('id_mapel')) has-error @endif">
                                    <label class="col-sm-3 control-label">Mata Pelajaran</label>
                                    <div class="col-sm-4">
                                    {!!Form::select('id_mapel',$listMapel,null,['id'=>'selectmp','class'=>'input-sm form-control','placeholder'=>"Pilih mata pelajaran"])!!}
                                        @if($errors->has('id_mapel'))<small class="text-danger">{{$errors->first('id_mapel')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('id_mapel')) has-error @endif">
                                    <label class="col-sm-3 control-label">Guru</label>
                                    <div class="col-sm-4">
                                    {!!Form::select('id_guru',[0=>'Guru'],null,['class'=>'input-sm form-control','id'=>'selectguru'])!!}
                                        @if($errors->has('id_guru'))<small class="text-danger">{{$errors->first('id_guru')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-3">
                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-ok"></i>OK</button>
                                    </div>
                                </div>
                    {!! Form::close() !!}
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Guru Mata Pelajaran</th>
                        </tr>
                        @foreach($mapel as $m)
                            <tr>
                                <td>{{$m->nama}}</td>
                                <td>{{$mapellokal[$m->id]->guru->nama}}</td>
                            </tr>
                        @endforeach
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
</div>
@endsection
@section('jsmore')
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

    var guruPerMapel = {!!$guruPerMapel!!}
    window.onload = function(){
        selectmp = document.getElementById('selectmp');
        selectmp.addEventListener('click',function(){setSelect(this.value,'selectguru')});
    }
    function setSelect(id,selectTarget) {
        jam = guruPerMapel[id];
        html="";
        sesiSelek = document.getElementById(selectTarget);
        for(i in jam){
            html+="<option value='"+jam[i].guru.id+"'>"+jam[i].guru.nama+"</option>";
        }
        sesiSelek.innerHTML=html;
    }

</script>
@endsection