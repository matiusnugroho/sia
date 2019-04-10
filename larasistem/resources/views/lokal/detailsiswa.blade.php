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
                            <dt>Semester :</dt><dd>{{$lokal->siswa}}</dd>
                            <dt>Wali Kelas :</dt><dd>{{$lokal->siswa}}</dd>

                        </dl>
                    </div>
                    @if($lokal->siswa->count()>0)
                    <table class="table table-hover">
                        <tr>
                            <td>NIS</td>
                            <td>Nama</td>
                        </tr>
                        @foreach($lokal->siswa as $siswa)
                        <tr>
                            <td>{{$siswa->nis}}</td>
                            <td>{{$siswa->nama}}</td>
                        </tr>
                    </table>
                    @else
                    <div class="error-desc">
            Belum ada data siswa yang terdaftar di lokal ini
            <br/><a href="{{url('/lokal/'.$lokal->id.'/tambahsiswa')}}" class="btn btn-primary m-t">Tambah siswa</a>
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