@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Detail User / {{$user->id}}<small></small></h2>
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
                                <div class="contact-box center-version">

                    <a href="profile.html">

                        <img alt="image" class="img-circle" src="{{url('/img')}}/{{$user->pp}}.jpg">


                        <h3 class="m-b-xs"><strong>{{$user->name}}</strong></h3>

                        <div class="font-bold">{{$user->role}}</div>
                        <div class="font-bold">{{$user->email}}</div>

                    </a>
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <a class="btn btn-xs btn-white"><i class="fa fa-edit"></i> Edit </a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-trash"></i> Hapus</a>
                        </div>
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