@extends('admin.index')
@section('title')- Tambah data guru @endsection
@section('isi')

<div class="row  border-bottom white-bg dashboard-header">
    <h2>Tambah data guru / <small>+</small></h2>
</div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-content">
            <div class="row m-b-sm p-md">
            {{-- {{dd($errors->messages->get('username'))}} --}}
                {!! Form::model($guru, ['method' => 'PATCH', 'route' => ['guru.update', $guru->id],'class' => 'form-horizontal']) !!}
                                
                <div class="form-group @if($errors->has('nip')) has-error @endif">
                                    <label class="col-sm-3 control-label">NIP</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('nip',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('nip'))<small class="text-danger">{{$errors->first('nip')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('nama',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('nama'))<small class="text-danger">{{$errors->first('nama')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('jenis_kelamin')) has-error @endif">
                                    <label class="col-sm-3 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-4">
                                        {!!Form::select('jenis_kelamin',$jk,null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('jenis_kelamin'))<small class="text-danger">{{$errors->first('jenis_kelamin')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('tgl_lahir')) has-error @endif">
                                    <label class="col-sm-3 control-label">Tempat/Tanggal Lahir</label>
                                    <div class="col-sm-2">
                                        {!!Form::text('tempat_lahir',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('tempat_lahir'))<small class="text-danger">{{$errors->first('tempat_lahir')}}</small>@endif
                                        <span class="help-blok">Tempat Lahir</span>
                                    </div>
                                    <div class="col-sm-2">
                                        {!!Form::date('tgl_lahir',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('tgl_lahir'))<small class="text-danger">{{$errors->first('tgl_lahir')}}</small>@endif
                                        <span class="help-blok">tgl/bln/thn</span>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('agama')) has-error @endif">
                                    <label class="col-sm-3 control-label">Agama</label>
                                    <div class="col-sm-4">
                                        {!!Form::select('agama',$agama,null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('agama'))<small class="text-danger">{{$errors->first('agama')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('no_telp')) has-error @endif">
                                    <label class="col-sm-3 control-label">No. Telp</label>
                                    <div class="col-sm-4">
                                        {!!Form::text('no_telp',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('no_telp'))<small class="text-danger">{{$errors->first('no_telp')}}</small>@endif
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
        {{-- <script>
         $(document).ready(function(){
            var input = $('#inputusername');
            var list = $('#listtac');
            var konten = $('#ulac');
            input.on('keyup',function(){
                var param = input.val();
                var html="";
                list.addClass('open');
                url = '{{url('guru/cari')}}/'+param;
                $.get(url,function(data){
                    if(data.length>0){
                        /*$('#email').val(data.email)*/
                        console.log(data);
                       for(i in data){
                        html+='<li>'+
                           '<div class="dropdown-messages-box">'+
                                '<div class="media-body ">'+
                                    '<strong>'+data[i].username+'</strong><br>'+
                                    '<strong>'+data[i].email+'</strong><br>'+
                                '</div>'+
                            '</div>'+
                        '</li>'+
                        '<li class="divider"></li>';
                       }
                    }
                    console.log(html);
                    konten.html(html);
                },'json')
            });
        });
    </script> --}}
@endsection