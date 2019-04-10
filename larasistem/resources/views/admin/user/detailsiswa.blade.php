@extends('admin.index')
@section('isi')
            <div class="row  border-bottom white-bg dashboard-header">
                <h2>Detail User / {{$user->id}}<small></small></h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                                <div class="btn-group">
                            <a href="{{url('user/'.$user->id.'/edit')}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-4">
                        @php
                            $src = is_null($user->pp)?url("img/default/default.png"):url('img/'.$user->username.'/'.$user->pp);
                        @endphp
                            <img alt="image" style="height: 150px; width: 150px" class="img-circle" src="{{$src}}">
                            <h4>{{$user->username}}</h4>
                        </div>
                        <div class="col-md-8">
                            <h4>Data Diri</h4>
                            @if($userDetail!=null)
                            <div class="row">
                            <dl class="dl-horizontal">
                                    <dt>Nama :</dt><dd>{{$userDetail->nama}}</dd>
                                    <dt>NIS:</dt><dd>{{$userDetail->nis}}</dd>
                                    <dt>Tanggal lahir :</dt><dd>{{$userDetail->tgl_lahir}}</dd>
                                </dl>
                               
                            </div>
                            @else
                                Belum ada data yang terkoneksi dengan username ini
                            @endif
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