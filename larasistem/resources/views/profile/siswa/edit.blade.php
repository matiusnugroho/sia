@extends('siswa.index')
@section('isi')
            <div class="row  border-bottom white-bg dashboard-header">
                <h2>Edit Profile</h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            {!! Form::model($saya, ['method' => 'post', 'route' => ['updateSiswa', $saya->id],'class' => 'form-horizontal']) !!}
                                <div class="form-group @if($errors->has('sayaname')) has-error @endif"><label class="col-sm-2 control-label">useraname</label>

                                    <div class="col-sm-3">
                                    {!! Form::text('username', $saya->user->username, ['class' => 'form-control']) !!}
                                    @if($errors->has('username'))<small class="text-danger">{{$errors->first('sayaname')}}</small>@endif
                                    </div>
                                </div>

                                
                                <div class="form-group @if($errors->has('email')) has-error @endif""><label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-3">
                                    {!! Form::text('email', $saya->user->email, ['class' => 'form-control']) !!}
                                    @if($errors->has('email'))<small class="text-danger">{{$errors->first('email')}}</small>@endif
                                    </div>
                                </div>

                                
                                
                                <div class="form-group @if($errors->has('password')) has-error @endif""><label class="col-sm-2 control-label">Password baru?</label>
                                    <div class="col-sm-3">
                                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                                    @if($errors->has('password'))<small class="text-danger">{{$errors->first('password')}}</small>@endif
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('nama')) has-error @endif""><label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-3">
                                    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                                    @if($errors->has('nama'))<small class="text-danger">{{$errors->first('password')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('jenis_kelamin')) has-error @endif">
                                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-4">
                                        {!!Form::select('jenis_kelamin',$jk,null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('jenis_kelamin'))<small class="text-danger">{{$errors->first('jenis_kelamin')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('tgl_lahir')) has-error @endif">
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-4">
                                        {!!Form::date('tgl_lahir',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('tgl_lahir'))<small class="text-danger">{{$errors->first('tgl_lahir')}}</small>@endif
                                        <span class="help-blok">tgl/bln/thn</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Ubah</button>
                                    </div>
                                </div>
                            </form>
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