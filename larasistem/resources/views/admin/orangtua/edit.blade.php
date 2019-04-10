@extends('admin.index')
@section('title')- Tambah data Orang Tua @endsection
@section('additionstyle')
    <link href="{{url('assets/css/plugins/chosen/chosen.css')}}" rel="stylesheet">
@endsection
@section('isi')

<div class="row  border-bottom white-bg dashboard-header">
    <h2>Orang Tua / <small>+</small></h2>
</div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-content">
            <div class="row m-b-sm p-md">
            {{-- {{dd($errors->messages->get('username'))}} --}}
                {!! Form::model($ortu, ['method' => 'PATCH', 'route' => ['orangtua.update', $ortu->id],'class' => 'form-horizontal']) !!}
                {!!Form::hidden('edit',"true")!!}
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('nama',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('nama'))<small class="text-danger">{{$errors->first('nama')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('jenis_kelamin')) has-error @endif">
                                    <label class="col-sm-3 control-label">Nomor Telepon</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('no_telepon',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('no_telepon'))<small class="text-danger">{{$errors->first('no_telepon')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('alamat')) has-error @endif">
                                    <label class="col-sm-3 control-label">Alamat</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('alamat',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('alamat'))<small class="text-danger">{{$errors->first('alamat')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('id_siswa')) has-error @endif">
                                    <label class="col-sm-3 control-label">Orang tua dari</label>
                                    <div class="col-sm-4">
                                    <select data-placeholder="ketik nama siswa" class="chosen-select form-control" multiple name="id_siswa[]">
                                    @foreach($siswa as $s)
                                        <option value="{{$s->id}}">{{$s->nama}}</option>
                                    @endforeach
                                    </select>
                                    @if($errors->has('id_siswa'))<small class="text-danger">{{$errors->first('no_telepon')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-3">
                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane"></i> Simpan</button>
                                    </div>
                                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
                
@endsection

@section('jsmore')
<script src="{{url('assets/js/plugins/chosen/chosen.jquery.js')}}"></script>
<script type="text/javascript">
    $(".chosen-select").chosen({'disable_search' : true})
</script>
@endsection