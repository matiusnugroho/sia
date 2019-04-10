@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Data Siswa</h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">

                    <div class="ibox">
                        <div class="ibox-title">
                        </div>
                        <div class="ibox-content">
                            <div class="project-list">
                            @if(count($anak) < 1 )
                            <div class="middle-box text-center animated bounceIn">
                                <h3 class="font-bold">Data tidak ditemukan</h3>
                                <div class="error-desc">
                                   Data anak tidak ditemukan
                                   <p><a class="btn btn-primary" href="{{url('/orangtua/'.$data->id.'/edit')}}"><i class="ti-plus"></i> Tambah Anak</a></p>
                                </div>
                            </div>
                            @else
                            <div class="row">
                            <p><a class="btn btn-primary" href="{{url('/orangtua/'.$data->id.'/edit')}}"><i class="ti-plus"></i> Tambah Anak</a></p>

                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="project-title">NIS</td>
                                        <td>Nama</td>
                                        <td>Pembimbing Akademik (No Telp)</td>
                                        <td>Lokal</td>
                                        <td>Wali Kelas (No Telp)</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                    @foreach($anak as $a)
                                        @php
                                            $lokal = $a->lokal;
                                            $nlokal = $lokal->count();
                                            $i=0;
                                        @endphp
                                        @foreach($lokal as $l)
                                            @if($i==0)
                                            <tr>
                                            <td rowspan="{{$nlokal}}">{{$a->nis}}</td>
                                            <td rowspan="{{$nlokal}}">{{$a->nama}}</td>
                                            <td rowspan="{{$nlokal}}">{{!is_null($a->pa)?$a->pa->nama."(".$a->pa->no_telepon.")":'PA Belumm ditetapkan'}}</td>
                                            <td>{{$l->kelas->kelas}} {{$l->nama}} <small>Semester {{$l->semester}}</small></td>
                                            <td>{{$l->guru->nama}} ({{$l->guru->no_telepon}})</td>
                                            </tr>
                                            @else
                                            <tr>
                                            <td>{{$l->kelas->kelas}} {{$l->nama}} <small>Semester {{$l->semester}}</small></td>
                                            <td>{{$l->guru->nama}} ({{$l->guru->no_telepon}})</td>
                                            </tr>
                                            @endif
                                            @php
                                            $i++;
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                                @endif
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