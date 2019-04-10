@extends('guru.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Profil Saya <a class="btn btn-sm btn-white" href="{{url('profile/edit')}}"><i class="ti-pencil-alt"></i> Edit</a></h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">
<div class="row">
<div class="ibox float-e-margins">
<div class="ibox-content p-md">

                    <div class="row">
					<div class="col-md-2">
					<div class="profile-image">
                        <img src="{{url('img/'.$saya->user->username.'/'.$saya->user->pp)}}" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
					</div>
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
									<dt>username :</dt><dd>{{$saya->user->username}}</dd>
									<dt>Nama :</dt><dd>{{$saya->nama}}</dd>
									<dt>NIP :</dt><dd>{{$saya->nip}}</dd>
                                    <dt>Jenis Kelamin :</dt><dd>{{$jeka[$saya->jenis_kelamin]}}</dd>
                                    <dt>Tanggal Lahir:</dt><dd>{{$saya->tgl_lahir}}</dd>
                                </dl>
								
                            </div>
					</div>
                </div>
				</div>
 </div>
</div>
@endsection

@section('jsmore')
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
@endsection