@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Data Lokal</h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">

                    <div class="ibox">
                        <div class="ibox-title">
                            <div class="ibox-tools">
                                <a data-toggle="modal" href="#modal-form-blangko" class="btn btn-primary btn-xs">Tambah Lokal</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="project-list">
                            @if(count($lokal) < 1 )
                            <div class="middle-box text-center animated bounceIn">
                                <h3 class="font-bold">Data tidak ditemukan</h3>
                                <div class="error-desc">
                                   Data lokal tidak ditemukan
                                </div>
                            </div>
                            @endif
                            <div class="row">                            
                            <div class="col-md-3"> {{$lokal->links()}}</div>
                            <div class="col-md-6">
                                 {!! Form::open(['route' => 'lokal.perta','method'=>'post', 'class' => 'form-horizontal']) !!}
                            <div class="form-group">
                    <label class="col-sm-4 control-label">Tahun Ajaran</label>
                    <div class="col-sm-8"> 
                    <div class="input-group"> 
                    {!!Form::select('ta',$ta,['0'=>'Pilih Tahun Ajaran'],['class'=>'input-sm form-control','id'=>'idmapel'])!!}
                    <span class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button></span>
                    </div>
                    </div></div>{!! Form::close() !!}
                            </div>
                           
                            </div>
                            <div class="row">

                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="project-title">Lokal</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Wali Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Jumlah Siswa</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    @foreach($lokal as $u)
                                    <tr>
                                    	<td class="project-title">
                                            {{$u->kelas->kelas}} {{$u->nama}}
                                        </td>
                                        <td class="project-title">
                                            {{$u->tahunAjaran->ta}}
                                        </td>
                                        <td>
                                            {{$u->guru->nama}}
                                        </td>
                                        <td>{{$u->jurusan->jurusan}}</td>
                                        <td>{{$u->siswa->count()}}</td>
                                        
                                        <td class="project-actions">
                                            <a href="{{url('/lokal/'.$u->id)}}" class="btn btn-white btn-sm"><i class="ti-search"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$lokal->links()}}
                                </div>
                            </div>
                            <!-- end project list -->
                        </div>
                    </div>
                </div>
                {{-- modal input blangko --}}
                <div id="modal-form-blangko" class="modal fade in">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                               <div class="ibox">
                                   <div class="ibox-content">
                                       <div class="row">
                                       {!! Form::open(['route' => 'lokal.store','method'=>'post', 'class' => 'form-horizontal']) !!}
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Jurusan</label>
                                            <div class="col-sm-4">
                                                {!!Form::select('jurusan',$jurusan,null,['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Kelas</label>
                                            <div class="col-sm-4">
                                                {!!Form::select('id_kelas',$kelas,null,['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>
                                           <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Kelas</label>
                                            <div class="col-sm-4">
                                                {!!Form::text('nama',null,['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Tahun Ajaran</label>
                                            <div class="col-sm-4">
                                                {!!Form::select('ta',$ta,null,['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Wali Kelas</label>
                                            <div class="col-sm-4">
                                                {!!Form::select('guru_id',$wali,null,['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9 col-sm-offset-3">
                                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-ok"></i>OK</button>
                                                </div>
                                            </div>

                                        {!! Form::close() !!}
                                       </div>
                                   </div>
                               </div>
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