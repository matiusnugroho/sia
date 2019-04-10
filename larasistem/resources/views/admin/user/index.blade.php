@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Data User / <small>{{$roleTextView}}</small></h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">

                    <div class="ibox">
                        <div class="ibox-title">
                            <div class="ibox-tools">
                                <a href="{{url('user/create')}}" class="btn btn-primary btn-xs">Buat user</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                {!! Form::open(['url' => 'user/cari','method'=>'get', 'class' => 'form-horizontal']) !!}
                                <div class="col-md-2">
                                {!!Form::select('role',["0"=>"Semua","1"=>"Admin","2"=>"Guru","3"=>"Siswa"],null,['class'=>'input-sm form-control'])!!}
                                </div>
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
                            @if(count($user) < 1 )
                            <div class="middle-box text-center animated bounceIn">
                                <h3 class="font-bold">Data tidak ditemukan</h3>
                                <div class="error-desc">
                                   Data yang dicari dengan kriteria yang anda minta tidak dapat ditemukan, coba lagi pencarian dengan parameter yang lain
                                </div>
                            </div>
                            @endif
                            <div class="row pull-right">
                            {{$user->links()}}
                            </div>

                                <table class="table table-hover">
                                    <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach($user as $u)
                                    @php
                                        $src = is_null($u->pp)?url("img/default/default.png"):url('img/'.$u->username.'/'.$u->pp);
                                    @endphp
                                    <tr>
                                        <td>{{$no++}}</td>
                                    	<td class="project-people">
                                            <img alt="foto profil" class="img-circle" src="{{$src}}">
                                        </td>
                                        <td class="project-title">
                                            <a href="project_detail.html">{{$u->username}}</a>
                                            <br/>
                                            <small>{{$u->role}}</small>
                                        </td>
                                        <td>
                                            {{$u->email}}
                                        </td>
                                        
                                        <td class="project-actions">
                                            <a href="{{url('/user/'.$u->id)}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                            <a href="{{url('/user/'.$u->id.'/edit')}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$user->links()}}
                            </div>
                            <!-- end project list -->
                        </div>
                    </div>
                </div>
@endsection

@section('jsmore')
<script src="{{url('assets/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
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