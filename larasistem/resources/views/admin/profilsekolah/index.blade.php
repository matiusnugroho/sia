@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Profil Sekolah</h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox shadow">
                                   <div class="ibox-content">
                                       <div class="row">
                                       {!! Form::open(['route' => 'profilsekolah.store','method'=>'post', 'class' => 'form-horizontal']) !!}
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Sekolah</label>
                                            <div class="col-sm-3">
                                                {!!Form::text('nama_sekolah',$sekolah['nama_sekolah'],['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>
                                           <div class="form-group">
                                            <label class="col-sm-3 control-label">NPSN</label>
                                            <div class="col-sm-3">
                                                {!!Form::text('npsn',$sekolah['npsn'],['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">NSS</label>
                                            <div class="col-sm-3">
                                                {!!Form::text('nss',$sekolah['nss'],['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Alamat</label>
                                            <div class="col-sm-3">
                                                {!!Form::text('alamat',$sekolah['alamat'],['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Telepon</label>
                                            <div class="col-sm-3">
                                                {!!Form::text('telp',$sekolah['telp'],['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">email</label>
                                            <div class="col-sm-3">
                                                {!!Form::text('email',$sekolah['email'],['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Website</label>
                                            <div class="col-sm-3">
                                                {!!Form::text('web',$sekolah['web'],['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3 col-sm-offset-3">
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