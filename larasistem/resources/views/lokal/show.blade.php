@extends('admin.index')
@section('isi')
            <div class="row  border-bottom white-bg dashboard-header">
                <h2>Detail Lokal / {{$lokal->nama}}<small></small></h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                    <div class="row">
                        <dl class="dl-horizontal">
                            <dt>Kelas :</dt><dd>{{$lokal->kelas->kelas}} {{$lokal->nama}}</dd>
                            <dt>Wali Kelas :</dt><dd>{{$lokal->guru->nama}}</dd>
                            <dt>Jumlah Siswa :</dt><dd>{{$jumlahSiswa}}</dd>
                        </dl>
                    </div>
                    <div class="row" >
                    <h1>Daftar Siswa</h1>
                    
                    @if($lokal->siswa->count()>0)
                    <a href="{{url('/lokal/'.$lokal->id.'/tambahsiswa')}}" class="btn btn-primary m-t">Tambah siswa</a>
                    <table class="table table-hover">
                        <tr class='text-center'>
                            <th>NO</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jenis kelamin</th>
                        </tr>
                        @php
                            $n=0;
                        @endphp
                        @foreach($lokal->siswa as $siswa)

                        <tr>
                            <td>{{++$n}}</td>
                            <td>{{$siswa->nis}}</td>
                            <td>{{$siswa->nama}}</td>
                            <td>{{$jk[$siswa->jenis_kelamin]}}</td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                    @else
                    <div class="middle-box text-center animated fadeInUp">
                    <div class="error-desc">
                        Belum ada data siswa yang terdaftar di lokal ini
                        <br/><a href="{{url('/lokal/'.$lokal->id.'/tambahsiswa')}}" class="btn btn-primary m-t">Tambah siswa</a>
                    </div>
                    </div>
                    @endif
                    
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