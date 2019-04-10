@extends('admin.index')
@section('title')- Tambah data Mata Pelajaran @endsection
@section('additionstyle')
    <link href="{{url('assets/css/selectize.bootstrap3.css')}}" rel="stylesheet">
@endsection
@section('isi')

<div class="row  border-bottom white-bg dashboard-header">
    <h2>Mata Pelajaran / <small><i class="fa fa-plus"></i> Tambah</small></h2>
</div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-content">
            <div class="row m-b-sm p-md">
            {{-- {{dd($errors->messages->get('username'))}} --}}
                {!! Form::open(['route' => 'matapelajaran.store','method'=>'post', 'class' => 'form-horizontal']) !!}
                <div class="form-group @if($errors->has('kode')) has-error @endif">
                                    <label class="col-sm-3 control-label">Kode</label>
                                    <div class="col-sm-3">
                                        {!!Form::text('kode',null,['class'=>'form-control'])!!}
                                        @if($errors->has('kode'))<small class="text-danger pull-left">{{$errors->first('kode')}}</small>@endif
                                    </div>                                         
                                </div>
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label class="col-sm-3 control-label">Mata Pelajaran</label>
                                    <div class="col-sm-3">
                                        {!!Form::text('nama',null,['class'=>'form-control'])!!}
                                        @if($errors->has('nama'))<small class="text-danger pull-left">{{$errors->first('nama')}}</small>@endif
                                    </div>                                         
                                </div>
                                <div class="form-group @if($errors->has('id_kelompok')) has-error @endif">
                                    <label class="col-sm-3 control-label">Kelompok</label>
                                    <div class="col-sm-3">
                                        {!!Form::select('id_kelompok',$kelompok,null,['class'=>'form-control'])!!}
                                        @if($errors->has('id_kelompok'))<small class="text-danger pull-left">{{$errors->first('id_kelompok')}}</small>@endif
                                    </div>                                         
                                </div>
                                <div class="form-group @if($errors->has('kkm')) has-error @endif">
                                    <label class="col-sm-3 control-label">KKM</label>
                                    <div class="col-sm-3">
                                        {!!Form::text('kkm',null,['class'=>'form-control'])!!}
                                        @if($errors->has('kkm'))<small class="text-danger pull-left">{{$errors->first('kkm')}}</small>@endif
                                    </div>                                         
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3 col-sm-offset-3">
                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-ok"></i>OK</button>
                                    </div>
                                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
                
@endsection

@section('jsmore')
<script src="{{url('assets/js/selectize.min.js')}}"></script>
<script type="text/javascript">
$('#inputmapel').selectize({
    persist: false,
    createOnBlur: true,
    create: true
});
</script>
@endsection