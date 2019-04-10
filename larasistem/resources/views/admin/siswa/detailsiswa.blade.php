@extends('admin.index')
@section('isi')
            <div class="row  border-bottom white-bg dashboard-header">
                <h2>Detail siswa / {{$siswa->nama}}<small></small></h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <a href="{{url('siswa/'.$siswa->id.'/edit')}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
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
                            <h4>{{$siswa->user->username}}</h4>
                        </div>
                        <div class="col-md-8">                        
                            <h4>Data Diri</h4>
                            <div class="row">
                            <table class="table table-hover">
                                <tr>
                                    <td>NIS</td><td>{{$siswa->nis}}</td>
                                </tr>
                                <tr>
                                    <td>NISN</td><td>{{$siswa->nisn}}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td><td>{{$siswa->nama}}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td><td>{{$jk[$siswa->jenis_kelamin]}}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td><td>{{$siswa->tempat_lahir}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td><td>{{$siswa->tgl_lahir}}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td><td>{{$agama[$siswa->agama]}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td><td>{{$siswa->alamat}}</td>
                                </tr>
                                <tr>
                                    <td>Status Dalam Keluarga</td><td>{{$siswa->status_dalam_keluarga}}</td>
                                </tr>
                                <tr>
                                    <td>Anak Ke</td><td>{{$siswa->anak_ke}}</td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td><td>{{$siswa->no_telp}}</td>
                                </tr>
                                <tr>
                                    <td>Asal Sekolah</td><td>{{$siswa->asal_sekolah}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Diterima</td><td>{{$siswa->tanggal_diterima}}</td>
                                </tr>
                                <tr>
                                    <td>Diterima di kelas</td><td>{{$siswa->kelas_awal}}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ayah</td><td>{{$siswa->nama_ayah}}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td><td>{{$siswa->nama_ibu}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Orang Tua</td><td>{{$siswa->alamat_ortu}}</td>
                                </tr>
                                <tr>
                                    <td>No. Telp Orang Tua</td><td>{{$siswa->telp_ortu}}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ayah</td><td>{{$siswa->pekerjaan_ayah}}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ibu</td><td>{{$siswa->pekerjaan_ibu}}</td>
                                </tr>
                                <tr>
                                    <td>Nama Wali</td><td>{{$siswa->nama_wali}}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Wali</td><td>{{$siswa->pekerjaan_wali}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Wali</td><td>{{$siswa->alamat_wali}}</td>
                                </tr>
                                <tr>
                                    <td>Telepon Wali</td><td>{{$siswa->telepon_wali}}</td>
                                </tr>
                            </table>
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