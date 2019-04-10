@extends('admin.index')
@section('title')- Tambah data Mata Pelajaran @endsection
@section('additionstyle')
    <link href="{{url('assets/css/selectize.bootstrap3.css')}}" rel="stylesheet">
@endsection
@section('isi')

<div class="row  border-bottom white-bg dashboard-header">
    <h2>Atur guru pengampu / <small>+</small></h2>
</div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-content">
            <div class="row m-b-sm p-md">
                {!! Form::open(['route' => ['gurupengampu.update',$id],'method'=>'patch', 'class' => 'form-horizontal']) !!}
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label class="col-sm-3 control-label">Guru Pengampu</label>
                                    <div class="col-sm-4">
                                        <select id="inputmapel" class="form-control" name="id_guru[]" multiple>
                                        @foreach($guru as $s)
                                            <option value="{{$s->id}}">{{$s->nama}}</option>
                                        @endforeach
                                        </select>
                                        @if($errors->has('username'))<small class="text-danger pull-left">{{$errors->first('username')}}</small>@endif
                                    </div>                                         
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-3">
                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-ok"></i>OK</button>
                                    </div>
                                </div>

                {!!Form::close()!!}
            </div>
            
            <div class="row m-b-sm p-md">
            <table class="table table-striped table-hover">
                <tr><th colspan='2'>Guru Pengampu</th></tr>
                @foreach($mapel->gurupengampu as $gp)
                    <tr>
                        <td>{{$gp->nama}}</td>
                        <td>{!!Form::open(['route'=>['gurupengampu.deletepengampu',$mapel->id,$gp->id],'method'=>'post'])!!}<button type="submit" class="btn btn-xs btn-bitbucket btn-danger"><i class="ti-close"></i></button>{!!Form::close()!!}</td></tr>
                @endforeach
            </table>
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