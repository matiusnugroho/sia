@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Data Lokal</h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
                                   <div class="ibox-content">
                                       <div class="row">
                                       {!! Form::open(['route' => 'lokal.store','method'=>'post', 'class' => 'form-horizontal']) !!}
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Kelas</label>
                                            <div class="col-sm-2">
                                                {!!Form::select('id_kelas',$kelas,null,['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>
                                           <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Kelas</label>
                                            <div class="col-sm-3">
                                                {!!Form::text('nama',null,['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Tahun Ajaran</label>
                                            <div class="col-sm-3">
                                                {!!Form::text('ta',null,['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Wali Kelas</label>
                                            <div class="col-sm-4">
                                                {!!Form::select('guru_id',$wali,null,['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-3">
                                                    <button type="submit" class="btn btn-primary pull-right"><i class="ti-check"></i> OK</button>
                                                </div>
                                            </div>

                                        {!! Form::close() !!}
                                       </div>
                                   </div>
                               </div>
</div>
                {{-- ujung modal blangko --}}
@endsection

@section('jsmore')
<script src="{{url('assets/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
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
<script>
$("#limit").TouchSpin({
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white',
                step:5,
                boostat: 6,
                maxboostedstep: 10,
                postfix: '/halaman',
            });
</script>
@endsection