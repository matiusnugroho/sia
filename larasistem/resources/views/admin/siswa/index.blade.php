@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Data Siswa</h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">

                    <div class="ibox shadow">
                        <div class="ibox-title">
                            <div class="ibox-tools">
                                <a href="{{url('siswa/create')}}" class="btn btn-primary btn-xs">Tambah siswa</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-1">
                                </div>
                                {!! Form::open(['url' => 'siswa/cari','method'=>'get', 'class' => 'form-horizontal']) !!}
                                <div class="col-md-3">
                                {!!Form::text('limit',20,['class'=>'input-sm form-control','id'=>'limit'])!!}
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group"><input type="text" placeholder="Cari" name="q" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button> </span></div>
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="project-list">
                            @if(count($siswa) < 1 )
                            <div class="middle-box text-center animated bounceIn">
                                <h3 class="font-bold">Data tidak ditemukan</h3>
                                <div class="error-desc">
                                   Data siswa tidak ditemukan
                                </div>
                            </div>
                            @endif
                            <div class="row pull-right">
                            {{$siswa->links()}}
                            </div>

                                <table class="table table-hover">
                                    <tr>
                                        <th></th>
                                        <th>NIS</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    <tbody>
                                    @foreach($siswa as $u)
                                    @php
                                        $src = is_null($u->foto)?url('img/default/default.png'):url($u->foto);
                                    @endphp
                                    <tr>
                                        <td class="client-avatar">
                                            <a href=""><img alt="image" class="img-circle" src="{{$src}}"></a>
                                        </td>
                                        <td>
                                            {{$u->nis}}
                                        </td>
                                        <td>
                                            {{$u->nisn}}
                                        </td>
                                        <td>
                                            {{$u->nama}}
                                        </td>
                                        <td>
                                            {{$jk[$u->jenis_kelamin]}}
                                        </td>
                                        <td>
                                            {{$u->status_siswa->status}}
                                        </td>
                                        
                                        <td class="project-actions">
                                            <div class="btn-group">
                                            <a href="{{url('/siswa/'.$u->id)}}" class="btn btn-white btn-sm"><i class="ti-search"></i></a>
                                            <a href="{{url('/siswa/'.$u->id.'/edit')}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$siswa->links()}}
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