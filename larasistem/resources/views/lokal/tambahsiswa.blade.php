@extends('admin.index')
@section('additionstyle')
    <link href="{{url('assets/css/plugins/chosen/chosen.css')}}" rel="stylesheet">
@endsection
@section('isi')
            <div class="row  border-bottom white-bg dashboard-header">
                <h2>Detail Lokal / {{$lokal->nama}}<small></small></h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                    <div class="row">
                    <div class="col-md-3">
                        <dl class="dl-horizontal">
                            <dt>Kelas :</dt><dd>{{$lokal->kelas->kelas}} {{$lokal->nama}}</dd>
                            <dt>Semester :</dt><dd>{{$lokal->semester}}</dd>
                            <dt>Wali Kelas :</dt><dd>{{$lokal->guru->nama}}</dd>

                        </dl>
                    </div>
                        <div class="col-md-9">
                        {!! Form::open(['url' => 'lokal/'.$lokal->id.'/tambahsiswa','method'=>'post', 'class' => 'form-horizontal']) !!}
                            <div class="form-group">
                                <div class="col-md-10">
                                <select data-placeholder="ketik nama siswa" class="chosen-select form-control" multiple name="id_siswa[]">
                                @foreach($siswa as $s)
                                    <option value="{{$s->id}}">{{$s->nama}}</option>
                                @endforeach
                                </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-ok"></i>OK</button>
                                </div>
                            </div>
                        {!!Form::close()!!}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
@endsection

@section('jsmore')
<script src="{{url('assets/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{url('assets/js/plugins/chosen/chosen.jquery.js')}}"></script>
<script>
$("#limit").TouchSpin({
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white',
                step:5,
                boostat: 6,
                maxboostedstep: 10,
                postfix: '/halaman',
            });
$(".chosen-select").chosen({'disable_search' : true})
</script>
@endsection