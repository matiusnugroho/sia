@extends('ortu.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Data Siswa</h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">

                    <div class="ibox">
                        <div class="ibox-title">
                        @if($errors->has('idlokal'))
                        <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{$errors->first('idlokal')}}
                        </div>
                        @endif
                        </div>
                        <div class="ibox-content">
                            <div class="project-list">
                            @if(count($anak) < 1 )
                            <div class="middle-box text-center animated bounceIn">
                                <h3 class="font-bold">Data tidak ditemukan</h3>
                                <div class="error-desc">
                                   Data anak tidak ditemukan
                                </div>
                            </div>
                            @endif
                            <div class="row">

                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="project-title">NIS</td>
                                        <td>Nama</td>
                                        <td>Rekap Nilai</td>
                                        <td>Rapor</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                    @foreach($anak as $a)
                                    <tr>
                                      <td>{{$a->nis}}</td>
                                      <td>{{$a->nama}}</td>
                                      <td>
                                          {!!Form::open(['route'=>['getrekap',$a->id],'class'=>'form-inline'])!!}
                                          <div class="form-group">
                                              {!!Form::select('idlokal',$lokalSiswa[$a->id],null,['class'=>'form-control','placeholder'=>'Pilih Lokal'])!!}
                                          </div>
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                          {!!Form::close()!!}
                                      </td>
                                      <td>
                                        {!!Form::open(['route'=>['getrapor',$a->id],'class'=>'form-inline'])!!}
                                          <div class="form-group">
                                              {!!Form::select('idlokal',$lokalSiswa[$a->id],null,['class'=>'form-control','placeholder'=>'Pilih Lokal'])!!}
                                          </div>
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                          {!!Form::close()!!}
                                      </td>
                                      </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <!-- end project list -->
                        </div>
                    </div>
                </div>
                {{-- modal input blangko --}}
                
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