@extends('admin.index')
@section('title')- Tambah data Mata Pelajaran @endsection
@section('additionstyle')
    <link href="{{url('assets/css/selectize.bootstrap3.css')}}" rel="stylesheet">
@endsection
@section('isi')

<div class="row  border-bottom white-bg dashboard-header">
    <h2>Tambah data Tahun Ajaran / <small>+</small></h2>
</div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-content">
            <div class="row m-b-sm p-md">
                {!! Form::open(['route' => 'tahunajaran.store','method'=>'post', 'class' => 'form-horizontal']) !!}
                                <div class="form-group @if($errors->has('tahunajaran')) has-error @endif">
                                    <label class="col-sm-3 control-label">Tahun Ajaran</label>
                                    <div class="col-sm-9">
                                    {!!Form::text('tahunajaran',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('tahunajarann'))<small class="text-danger pull-left">{{$errors->first('tahunajaran')}}</small>@endif
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