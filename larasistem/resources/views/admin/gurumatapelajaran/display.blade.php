@extends('admin.index')
@section('title')- Lihat guru Mata Pelajaran @endsection
@section('additionstyle')
<link href="{{url('assets/css/plugins/footable/footable.standalone.min.css')}}" rel="stylesheet">
@endsection
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <h2>Guru Mata Pelajaran</h2>
</div>
<div class="wrapper wrapper-content">
{{-- <div class="col-lg-12"> --}}
            <div class="ibox float-e-margins">
                {{-- <div class="ibox-title">
                    <h5>Pilih Rekap Nilai<small class="m-l-sm"></small></h5>
                </div> --}}
                <div class="ibox-content p-md">

                    <div class="row m-b-sm p-md">
                    {!! Form::open(['route' => 'gurumatapelajaran.setguru','method'=>'post', 'class' => 'form-horizontal']) !!}
                    {!!Form::hidden('ta',$ta)!!}
                    <button type="submit" class="btn btn-primary"><i class="ti-write"></i> Kelola</button>
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <td></td>
                            @foreach($lokal as $l)
                            <td>{{$l->kelas->kelas}} {{$l->nama}} (s{{$l->semester}})</td>
                            @endforeach
                        </tr>
                        @foreach($mapel as $m)
                            <tr>
                                <td>{{$m->nama}}</td>
                                @foreach($lokal as $l)
                                <td>{{$guru[$reservedGuru[$l->id."-".$m->id]]}}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="ti-write"></i> Kelola</button>
                    {!!Form::close()!!}
                    </div>
                </div>
            </div>
        {{-- </div> --}}
</div>
@endsection
@section('jsmore')
<script src="{{url("assets/js/plugins/footable/footable.min.js")}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.footable').footable(
            {
                "sorting": {
                    "enabled": true
                },
            });

    });

</script>
@endsection