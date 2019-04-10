@extends('admin.index')
@section('title')- Tambah data Orang Tua @endsection
@section('additionstyle')
    <link href="{{url('assets/css/plugins/chosen/chosen.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('isi')

<div class="row  border-bottom white-bg dashboard-header">
    <h2>{{$guru->nama}} / <small>Siswa Bimbingan</small></h2>
</div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-content">
            <div class="row m-b-sm p-md">
            	<div class="col-sm-4">
            	@if($guru->siswa->count()==0)
            	<h1>Belum ada siswa bimbingan</h1>
            	@endif
            		<ul class="list-unstyled file-list">
            			@foreach($guru->siswa as $sb)
            				<li>{!!Form::open(['route'=>['pa.destroy',$sb->id],'method'=>'delete','class'=>'hapussb','id'=>'hapussb'.$sb->id])!!}<button type="submit" class="btn btn-xs btn-bitbucket btn-danger"><i class="ti-close"></i></button> {{$sb->nama}} {!!Form::close()!!}
            				</li>
            			@endforeach
            		</ul>
            	</div>
            	<div class="col-sm-8"> 
                {!! Form::open(['route' => ['pa.update',$guru->id],'method'=>'PATCH', 'class' => 'form-horizontal']) !!}
                                <div class="form-group @if($errors->has('id_siswa')) has-error @endif">
                                    <label class="col-sm-3 control-label">Siswa Bimbingan</label>
                                    <div class="col-sm-4">
                                    <select data-placeholder="ketik nama siswa" class="chosen-select form-control" multiple name="id_siswa[]">
                                    @foreach($siswa as $s)
                                        <option value="{{$s->id}}">{{$s->nama}}</option>
                                    @endforeach
                                    </select>
                                    @if($errors->has('id_siswa'))<small class="text-danger">{{$errors->first('id_siswa')}}</small>@endif
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
</div>
                
@endsection

@section('jsmore')
<script src="{{url('assets/js/plugins/chosen/chosen.jquery.js')}}"></script>
<script src="{{url('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(".chosen-select").chosen({'disable_search' : true})
</script>
<script type="text/javascript">
    $('.hapussb').submit(function(event){

        event.preventDefault();
        var id = '#'+this.id;
        console.log(id);
        swal({
        title: "Apakah anda yaki?",
        text: "Siswa akan dihapus dari daftar bimbingan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya!",
        closeOnConfirm: true
    }, function () {
        $(id).off('submit');
        $(id).submit();
    });
    })
</script>
@endsection