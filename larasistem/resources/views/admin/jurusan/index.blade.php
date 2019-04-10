@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Data Jurusan</h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">

                    <div class="ibox shadow">
                        <div class="ibox-title">
                            <div class="ibox-tools">
                                <a href="{{url('jurusan/create')}}" class="btn btn-primary">Tambah Jurusan</a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="project-list">
                            @if(count($jurusan) < 1 )
                            <div class="middle-box text-center animated bounceIn">
                                <h3 class="font-bold">Data tidak ditemukan</h3>
                                <div class="error-desc">
                                   Data jurusan tidak ditemukan
                                </div>
                            </div>
                            @endif
                                <table class="table table-hover">
                                    <thead>
                                        <th>Jurusan</th>
                                        <th>Bidang Keahlian</th>
                                        <th>Kompetensi Umum</th>
                                        <th>Kompetensi Khusus</th>
                                        <th>Ketua Jurusan</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($jurusan as $u)
                                    <tr>
                                    <td>
                                            {{$u->jurusan}}
                                        </td>
                                        <td>{{$u->bidang_keahlian}}</td>
                                        <td>{{$u->kompetensi_umum}}</td>
                                        <td>{{$u->kompetensi_khusus}}</td>
                                        @if(!empty($u->ketuaJurusan))
                                        <td>{{$u->ketuaJurusan->nama}}</td>
                                        @else
                                        <td></td>
                                        @endif
                                        
                                        <td class="project-actions">
                                        <div class="btn-group">
                                          <a href="{{url('/jurusan/'.$u->id.'/edit')}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i></a>
                                        </div>                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end project list -->
                        </div>
                    </div>
                </div>
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