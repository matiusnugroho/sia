@extends('admin.index')
@section('isi')
            <div class="row  border-bottom white-bg dashboard-header">
                <h2>Detail Guru / {{$guru->nama}}<small></small></h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <a href="{{url('guru/'.$guru->id.'/edit')}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-4">
                        @php
                            $a=Auth::user();
                            $src = is_null($a->pp)?url("img/default/default.png"):url('img/'.$a->username.'/'.$a->pp);
                        @endphp
                            <img alt="image" style="height: 150px; width: 150px" class="img-circle" src="{{$src}}">
                            <h4>{{$guru->user->username}}</h4>
                        </div>
                        <div class="col-md-8">
                            <h4>Data Diri</h4>
                            <div class="row">
                                <div class="col-md-4">Nama</div><div class="col-md-8">{{$guru->nama}}</div>
                                <div class="col-md-4">NIP</div><div class="col-md-8">{{$guru->nip}}</div>
                                <div class="col-md-4">Tanggal Lahir</div><div class="col-md-8">{{$guru->tgl_lahir}}</div>
                                <div class="col-md-4">Jenis Kelamin</div><div class="col-md-8">{{$jk[$guru->jenis_kelamin]}}</div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
@endsection

@section('jsmore')
<script src="{{url('js/plugins/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
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