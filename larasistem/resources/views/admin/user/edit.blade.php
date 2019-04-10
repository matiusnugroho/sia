@extends('admin.index')
@section('isi')
            <div class="row  border-bottom white-bg dashboard-header">
                <h2>Edit User / {{$user->email}}<small></small></h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', $user->id],'class' => 'form-horizontal']) !!}
                            {!!Form::hidden('userid',$user->id)!!}
                                <div class="form-group @if($errors->has('username')) has-error @endif"><label class="col-sm-2 control-label">Username</label>

                                    <div class="col-sm-10">
                                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                                    @if($errors->has('username'))<small class="text-danger">{{$errors->first('username')}}</small>@endif
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group @if($errors->has('email')) has-error @endif""><label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                    @if($errors->has('email'))<small class="text-danger">{{$errors->first('email')}}</small>@endif
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group @if($errors->has('password_new')) has-error @endif""><label class="col-sm-2 control-label">Password baru?</label>
                                    <div class="col-sm-10">
                                    {!! Form::text('password_new', null, ['class' => 'form-control']) !!}
                                    @if($errors->has('password_new'))<small class="text-danger">{{$errors->first('password_new')}}</small>@endif
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
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