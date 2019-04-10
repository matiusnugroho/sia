@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Data Mata Pelajaran</h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">

                    <div class="ibox">
                        <div class="ibox-title">
                            <div class="ibox-tools">
                                <a href="{{url('matapelajaran/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="project-list">
                            @if(count($mapel) < 1 )
                            <div class="middle-box text-center animated bounceIn">
                                <h3 class="font-bold">Data tidak ditemukan</h3>
                                <div class="error-desc">
                                   Data mapel tidak ditemukan
                                </div>
                            </div>
                            @endif
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>Kode MP</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelompok</th>
                                        <th>KKM</th>
                                        <th>Guru Pengampu</th>
                                        <th></th>
                                    </tr>
                                    @foreach($mapel as $u)
                                    <tr>
                                        <td>
                                            {{$u->kode}}
                                        </td> 
                                        <td>
                                            {{$u->nama}}
                                        </td>  
                                        <td>
                                            {{$u->kelompok->kelompok}} {{$u->kelompok->keterangan !=""? "(".$u->kelompok->keterangan.")":""}}
                                        </td> 
                                        <td>
                                            {{$u->kkm}}
                                        </td> 
                                        <td>
                                        <?php
                                            $guruPengampu="";
                                            foreach ($u->gurupengampu as $gp) {
                                                $guruPengampu .=$gp->nama.", ";
                                            }
                                            $guruPengampu = rtrim($guruPengampu,', ');
                                        ?>
                                        {{$guruPengampu}}
                                        </td>                                      
                                        <td class="project-actions">
                                        <div class="btn-group">
                                          <a href="{{url('/matapelajaran/'.$u->id.'/edit')}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i></a>
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