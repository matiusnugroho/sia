@extends('admin.index')
@section('title')- Tambah data Mata Pelajaran @endsection
@section('additionstyle')
    <link href="{{url('assets/css/selectize.bootstrap3.css')}}" rel="stylesheet">
@endsection
@section('isi')

<div class="row  border-bottom white-bg dashboard-header">
    <h2>Tambah data jurusan/ <small>+</small></h2>
</div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-content">
            <div class="row m-b-sm p-md">
            {!! Form::open(['route' => 'jadwal.store','method'=>'post', 'class' => 'form-horizontal']) !!}
                                <div class="form-group @if($errors->has('jurusan')) has-error @endif">
                                    <label class="col-sm-3 control-label">Jurusan</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('jurusan',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('jurusan'))<small class="text-danger">{{$errors->first('jurusan')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('bidang_keahlian')) has-error @endif">
                                    <label class="col-sm-3 control-label">bidang_keahlian</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('bidang_keahlian',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('bidang_keahlian'))<small class="text-danger">{{$errors->first('bidang_keahlian')}}</small>@endif
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('kompetensi_umum')) has-error @endif">
                                    <label class="col-sm-3 control-label">kompetensi_umum</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('kompetensi_umum',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('kompetensi_umum'))<small class="text-danger">{{$errors->first('kompetensi_umum')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('kompetensi_khusus')) has-error @endif">
                                    <label class="col-sm-3 control-label">kompetensi_khusus</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('kompetensi_khusus',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('kompetensi_khusus'))<small class="text-danger">{{$errors->first('kompetensi_khusus')}}</small>@endif
                                    </div>
                                </div>
                                
                                <div class="form-group @if($errors->has('ketua_jurusan')) has-error @endif">
                                    <label class="col-sm-3 control-label">Mata Pelajaran</label>
                                    <div class="col-sm-9">
                                        <select id="selectKetua" class="form-control" name="ketua_jurusan">
                                        @foreach($guru as $s)
                                            <option value="{{$s->id}}">{{$s->nama}}</option>
                                        @endforeach
                                        </select>
                                        <span class="help-blok">Tekan panah bawah untuk memilih atau ketikkan nama</span>
                                        @if($errors->has('ketua_jurusan'))<small class="text-danger pull-left">{{$errors->first('ketua_jurusan')}}</small>@endif
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
$('#selectKetua').selectize({
    persist: false,
    createOnBlur: true,
    create: true
});
</script>
@endsection