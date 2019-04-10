@extends('admin.index')
@section('title')- Tambah data Orang Tua @endsection
@section('additionstyle')
    <link href="{{url('assets/css/plugins/chosen/chosen.css')}}" rel="stylesheet">
@endsection
@section('isi')

<div class="row  border-bottom white-bg dashboard-header">
    <h2>Jam Ajar / <small>+</small></h2>
</div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-content">
            <div class="row m-b-sm p-md">
            {!! Form::open(['route' => 'jamajar.store','method'=>'post', 'class' => 'form-horizontal']) !!}
                                <div class="form-group @if($errors->has('hari')) has-error @endif">
                                    <label class="col-sm-3 control-label">hari</label>
                                    <div class="col-sm-4">
                                    {!!Form::select('hari',$hari,null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('hari'))<small class="text-danger">{{$errors->first('hari')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('ke')) has-error @endif">
                                    <label class="col-sm-3 control-label">Ke</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('ke',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('ke'))<small class="text-danger">{{$errors->first('ke')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('jam')) has-error @endif">
                                    <label class="col-sm-3 control-label">Jam</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('jam',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('jam'))<small class="text-danger">{{$errors->first('jam')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-3">
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
<script src="{{url('assets/js/plugins/chosen/chosen.jquery.js')}}"></script>
<script type="text/javascript">
    $(".chosen-select").chosen({'disable_search' : true})
</script>
@endsection