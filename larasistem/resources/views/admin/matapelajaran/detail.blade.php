@extends('admin.index')
@section('title')- Tambah data Mata Pelajaran @endsection
@section('additionstyle')
    <link href="{{url('assets/css/selectize.bootstrap3.css')}}" rel="stylesheet">
@endsection
@section('isi')

<div class="row  border-bottom white-bg dashboard-header">
    <h2>Mata Pelajaran / <small>Detail</small></h2>
</div>
<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-content">
            <div class="row m-b-sm p-md">
                <h2>{{$mapel->nama}}<small><a href="{{url('matapelajaran/'.$mapel->id.'/edit')}}" class=""><i class="ti-pencil"></i></small></a></h2>
                <h5>Guru Pengampu : {{$guruPengampu}}</h5>
            </div>
        </div>
    </div>
</div>
                
@endsection

@section('jsmore')
<script src="{{url('assets/js/selectize.min.js')}}"></script>
<script type="text/javascript">
$('#inputmapel').selectize({
    persist: false,
    createOnBlur: true,
    create: true
});
</script>
@endsection