@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Data Guru</h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">

                    <div class="ibox">
                        <div class="ibox-title">
                            <div class="ibox-tools">
                                <a href="{{url('guru/create')}}" class="btn btn-primary btn-xs">Tambah Guru</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                {!! Form::open(['url' => 'guru/cari','method'=>'get', 'class' => 'form-horizontal']) !!}
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
                            @if(count($guru) < 1 )
                            <div class="middle-box text-center animated bounceIn">
                                <h3 class="font-bold">Data tidak ditemukan</h3>
                                <div class="error-desc">
                                   Data guru tidak ditemukan
                                </div>
                            </div>
                            @endif
                            <div class="row pull-right">
                            {{$guru->links()}}
                            </div>

                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr>
                                        <th>No.</th>
                                        <th>username</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Wali Kelas</th>
                                        <th></th>
                                    </tr>
                                    @php $no=1; @endphp
                                    @foreach($guru as $u)
                                    @php
                                        $src = is_null($u->user->pp)?"img/default/default.png":url('img/'.$u->user->username.'/'.$u->user->pp);

                                    @endphp
                                    <tr>
                                        <td>{{$no++}}</td>
                                    	<td class="client-avatar">
                                            <a href=""><img alt="image" class="img-circle" src="{{$src}}"></a>                                            
                                            <br/>
                                            {{$u->user->username}} /<small>usernsme</small>
                                        </td>
                                        <td>
                                            {{$u->nip}}
                                        </td>
                                        <td>
                                            {{$u->nama}}
                                        </td>
                                        <td>{{ !is_null($u->waliDi) ? $u->waliDi->kelas->kelas.' '.$u->waliDi->nama.' '.$u->waliDi->jurusan->jurusan : 'Bukan wali kelas'}}</td>
                                        
                                        <td class="project-actions">
                                            <div class="btn-group">
                                            <a href="{{url('/guru/'.$u->id)}}" class="btn btn-white btn-sm"><i class="ti-search"></i></a>
                                            <a href="{{url('/guru/'.$u->id.'/edit')}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$guru->links()}}
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