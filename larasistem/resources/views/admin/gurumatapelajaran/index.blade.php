@extends('admin.index')
@section('title')- Lihat guru Mata Pelajaran @endsection
@section('additionstyle')
<link href="{{url('assets/css/plugins/footable/footable.standalone.min.css')}}" rel="stylesheet">
@endsection
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <h2>Guru Mata Pelajaran</h2>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox float-e-margins">
        <div class="ibox-content p-md">
            <div class="row m-b-sm p-md">
                {!! Form::open(['route' => 'gurumatapelajaran.setguru','method'=>'post', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    <label class="col-sm-4 control-label">Tahun Ajaran</label>
                    <div class="col-sm-3"> 
                    {!!Form::select('ta',$ta,['0'=>'Pilih Tahun Ajaran'],['class'=>'input-sm form-control','id'=>'idmapel'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Tahun Ajaran</label>
                    <div class="col-sm-3"> 
                    {!!Form::select('ta',$ta,['0'=>'Pilih Tahun Ajaran'],['class'=>'input-sm form-control','id'=>'idmapel'])!!}
                    </div>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>  
                {!! Form::close() !!}          
            </div>
            
        </div><!-- end ibox content -->
    </div><!-- end ibox -->
</div><!-- end wrapper -->
@endsection
@section('jsmore')
<script src="{{url("assets/js/plugins/footable/footable.min.js")}}"></script>
<script src="{{url('assets/js/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{url('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript">
function showNotif(p)
{
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "progressBar": true,
      "preventDuplicates": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "400",
      "hideDuration": "1000",
      "timeOut": "3000",
      "extendedTimeOut": "1000",
      "showEasing": "linear",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr.success(p, "Berhasil");
}

@if (session('sukses'))
    window.onload=showNotif('{{session('sukses')}}');
@endif
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