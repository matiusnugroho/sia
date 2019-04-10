@extends('admin.index')
@section('isi')
            <div class="row  border-bottom white-bg dashboard-header">
                <h2>Edit Siswa / {{$siswa->nama}}<small></small></h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                            {!! Form::model($siswa, ['files'=>true, 'method' => 'PATCH', 'route' => ['siswa.update', $siswa->id],'class' => 'form-horizontal']) !!}
							<div class="col-sm-7">
                                <div class="form-group @if($errors->has('status')) has-error @endif">
                                    <label class="col-sm-6 control-label">Status</label>
                                    <div class="col-sm-6">
                                        {!!Form::select('status',$status,null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('status'))<small class="text-danger">{{$errors->first('status')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('nis')) has-error @endif">
                                    <label class="col-sm-6 control-label">NIS</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('nis',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('nis'))<small class="text-danger">{{$errors->first('nis')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('nisn')) has-error @endif">
                                    <label class="col-sm-6 control-label">NISN</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('nisn',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('nisn'))<small class="text-danger">{{$errors->first('nisn')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('nama')) has-error @endif">
                                    <label class="col-sm-6 control-label">Nama</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('nama',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('nama'))<small class="text-danger">{{$errors->first('nama')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('jenis_kelamin')) has-error @endif">
                                    <label class="col-sm-6 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-6">
                                        {!!Form::select('jenis_kelamin',$jk,null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('jenis_kelamin'))<small class="text-danger">{{$errors->first('jenis_kelamin')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('tgl_lahir')) has-error @endif">
                                    <label class="col-sm-6 control-label">Tempat/Tanggal Lahir</label>
                                    <div class="col-sm-2">
                                        {!!Form::text('tempat_lahir',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('tempat_lahir'))<small class="text-danger">{{$errors->first('tempat_lahir')}}</small>@endif
                                        <span class="help-blok">Tempat Lahir</span>
                                    </div>
                                    <div class="col-sm-2">
                                        {!!Form::date('tgl_lahir',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('tgl_lahir'))<small class="text-danger">{{$errors->first('tgl_lahir')}}</small>@endif
                                        <span class="help-blok">tgl/bln/thn</span>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('agama')) has-error @endif">
                                    <label class="col-sm-6 control-label">Agama</label>
                                    <div class="col-sm-6">
                                        {!!Form::select('agama',$agama,null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('agama'))<small class="text-danger">{{$errors->first('agama')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('status_dalam_keluarga')) has-error @endif">
                                    <label class="col-sm-6 control-label">Status Dalam Keluarga</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('status_dalam_keluarga',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('status_dalam_keluarga'))<small class="text-danger">{{$errors->first('status_dalam_keluarga')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('anak_ke')) has-error @endif">
                                    <label class="col-sm-6 control-label">Anak Ke</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('anak_ke',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('anak_ke'))<small class="text-danger">{{$errors->first('anak_ke')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('alamat')) has-error @endif">
                                    <label class="col-sm-6 control-label">Alamat</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('alamat',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('alamat'))<small class="text-danger">{{$errors->first('alamat')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('no_telp')) has-error @endif">
                                    <label class="col-sm-6 control-label">No. Telp</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('no_telp',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('no_telp'))<small class="text-danger">{{$errors->first('no_telp')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('asal_sekolah')) has-error @endif">
                                    <label class="col-sm-6 control-label">Asal Sekolah</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('asal_sekolah',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('asal_sekolah'))<small class="text-danger">{{$errors->first('asal_sekolah')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('kelas_awal')) has-error @endif">
                                    <label class="col-sm-6 control-label">Kelas Awal</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('kelas_awal',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('kelas_awal'))<small class="text-danger">{{$errors->first('kelas_awal')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('tanggal_diterima')) has-error @endif">
                                    <label class="col-sm-6 control-label">Tanggal Diterima</label>
                                    <div class="col-sm-6">
                                        {!!Form::date('tanggal_diterima',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('tanggal_diterima'))<small class="text-danger">{{$errors->first('tanggal_diterima')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('nama_ayah')) has-error @endif">
                                    <label class="col-sm-6 control-label">Nama Ayah</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('nama_ayah',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('nama_ayah'))<small class="text-danger">{{$errors->first('nama_ayah')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('nama_ibu')) has-error @endif">
                                    <label class="col-sm-6 control-label">Nama Ibu</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('nama_ibu',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('nama_ibu'))<small class="text-danger">{{$errors->first('nama_ibu')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('alamat_ortu')) has-error @endif">
                                    <label class="col-sm-6 control-label">Alamat Ortu</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('alamat_ortu',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('alamat_ortu'))<small class="text-danger">{{$errors->first('alamat_ortu')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('telp_ortu')) has-error @endif">
                                    <label class="col-sm-6 control-label">Telp. Ortu</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('telp_ortu',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('telp_ortu'))<small class="text-danger">{{$errors->first('telp_ortu')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('pekerjaan_ayah')) has-error @endif">
                                    <label class="col-sm-6 control-label">Pekerjaan Ayah</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('pekerjaan_ayah',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('pekerjaan_ayah'))<small class="text-danger">{{$errors->first('pekerjaan_ayah')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('pekerjaan_ibu')) has-error @endif">
                                    <label class="col-sm-6 control-label">Pekerjaan Ibu</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('pekerjaan_ibu',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('pekerjaan_ibu'))<small class="text-danger">{{$errors->first('pekerjaan_ibu')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('nama_wali')) has-error @endif">
                                    <label class="col-sm-6 control-label">Nama Wali</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('nama_wali',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('nama_wali'))<small class="text-danger">{{$errors->first('nama_wali')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('alamat_wali')) has-error @endif">
                                    <label class="col-sm-6 control-label">Alamat Wali</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('alamat_wali',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('alamat_wali'))<small class="text-danger">{{$errors->first('alamat_wali')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('telepon_wali')) has-error @endif">
                                    <label class="col-sm-6 control-label">Telepon Wali</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('telepon_wali',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('telepon_wali'))<small class="text-danger">{{$errors->first('telepon_wali')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('pekerjaan_wali')) has-error @endif">
                                    <label class="col-sm-6 control-label">Pekerjaan Wali</label>
                                    <div class="col-sm-6">
                                        {!!Form::text('pekerjaan_wali',null,['class'=>'input-sm form-control'])!!}
                                        @if($errors->has('pekerjaan_wali'))<small class="text-danger">{{$errors->first('pekerjaan_wali')}}</small>@endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-ok"></i>OK</button>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-5">
                                <div class="form-group @if($errors->has('pekerjaan_wali')) has-error @endif">
                                <label class="control-label">Upload Foto</label>
                                <div class="preview-zone hidden">
                                    <div class="box box-solid">
                                    <div class="box-header with-border">
                                    <div><b>Preview</b></div>
                                    <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-danger btn-xs remove-preview">
                                        <i class="fa fa-times"></i> Ulangi
                                    </button>
                                    </div>
                                    </div>
                                    <div class="box-body"></div>
                                    </div>
                                </div>
                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                    <i class="fa fa-upload"></i>
                                    <p>Upload file atau seret ke sini.</p>
                                    </div>
                                    <input type="file" name="foto" class="dropzone">
                                </div>
                                </div>
                                </div>
                            {!!Form::close()!!}
							</div>
                        </div>
                    </div>
            </div>
@endsection

@section('jsmore')
<script src="{{url('js/plugins/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{url('js/uploader.js')}}"></script>
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