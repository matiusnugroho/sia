@extends('guru.index')
@section('additionstyle')
<link href="{{url('assets/css/plugins/footable/footable.standalone.min.css')}}" rel="stylesheet">
@endsection
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <h2>Rekap Nilai</h2>
</div>
<div class="wrapper wrapper-content">
{{-- <div class="col-lg-12"> --}}
            <div class="ibox float-e-margins">
                {{-- <div class="ibox-title">
                    <h5>Pilih Rekap Nilai<small class="m-l-sm"></small></h5>
                </div> --}}
                <div class="ibox-content p-md">

                    <div class="row m-b-sm p-md">
                    {!! Form::open(['url' => 'rekapnilai/laporan','method'=>'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                    {!!Form::select('idmapel',$listMapel,['0'=>'Mata Pelajaran'],['class'=>'input-sm form-control','id'=>'idmapel'])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::select('idlokal',["0"=>"Lokal"],null,['class'=>'input-sm form-control','id'=>'lokalnya'])!!}
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                    </div>

                    <div class="row m-b-sm p-md">
                                <div class="col-sm-12 ">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-small btn-primary" href="{{url('rekapnilai/laporan/excel?idmapelExcel='.$idmapel.'&idlokalExcel='.$idlokal)}}"><i class="fa fa-file-excel-o"></i> Excel</a>
                                        <a class="btn btn-small btn-primary" href="{{url('rekapnilai/laporan/pdf?idmapelPDF='.$idmapel.'&idlokalPDF='.$idlokal)}}"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                    </div>
                                </div> 
                        @if(count($kolom)<1)
                            <h1>Tidak ada data rekap nilai yang bisa ditampilkan</h1>
                        @else
                            <div class="row m-b-sm p-md">
                                <dl class="dl-horizontal">
                                    <dt>Kelas :</dt><dd>{{$namaKelas}}</dd>
                                    <dt>Rata - rata kelas :</dt><dd>{{$rataKelas}}</dd>
                                    <dt>Di atas rata-rata: </dt><dd>{{$diatasRata}} Siswa</dd>
                                    <dt>Di bawah rata-rata :</dt><dd>{{$dibawahRata}} Siswa</dd>
                                </dl>
                            </div>

                            <div class="row m-b-sm p-md">               
                                <table class="footable table table-hover" data-filtering="true">
                                <thead>
                                    <tr>
                                        <th data-type="number">{{$kolompertama['rank']}}</th>
                                        <th>{{$kolompertama['nis']}}</th>
                                        <th>{{$kolompertama['nama']}}</th>
                                        <?php
                                            $nilai = $kolompertama['nilai'];
                                        ?>
                                        @foreach($nilai as $n)
                                            <th  data-type="number">{{$n}}</th>
                                        @endforeach
                                        <th>{{$kolompertama['rerata']}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($kolom as $data)
                                <tr>
                                    <td>{{$data['rank']}}</td>
                                    <td>{{$data['nis']}}</td>
                                    <td>{{$data['nama']}}</td>
                                    <?php
                                        $nilai = $data['nilai'];
                                    ?>
                                    @foreach($nilai as $n)
                                        <td>{{$n}}</td>
                                    @endforeach
                                    <td>{{$data['rerata']}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        {{-- </div> --}}
</div>

{{-- modal input blangko --}}
                <div id="modal-form-blangko" class="modal fade in">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                     {!! Form::open(['route' => 'rekapnilai.store','method'=>'post', 'class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                    <label class="col-sm-3 control-label">Lokal/MataPelajaran</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                {!!Form::select('idmapelcreate',$listMapel,0,['class'=>'input-sm form-control','id'=>'idmapelcreate'])!!}
                                            </div>
                                            <div class="col-md-6">
                                                {!!Form::select('idlokalcreate',["0"=>"Lokal"],null,['class'=>'input-sm form-control','id'=>'lokalnyacreate'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lokal/MataPelajaran</label>
                                        <div class="col-sm-9">
                                            {!!Form::text('judul',null,['class'=>'input-sm form-control'])!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-ok"></i>OK</button>
                                        </div>
                                    </div>
                                </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ujung modal blangko --}}

@endsection
@section('jsmore')
<script src="{{url('assets/js/plugins/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
    function showNotif(p)
    {
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "progressBar": true,
          "preventDuplicates": false,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "400",
          "hideDuration": "1000",
          "timeOut": "3000",
          "extendedTimeOut": "1000",
          "showEasing": "linear",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr.success(p, "Berhasil");
    }
    @if (session('sukses'))
        window.onload=showNotif('{{session('sukses')}}');
    @endif
    var listLokal = {!!$lokalDariMapelJSON!!}
    window.onload = function(){
        mapelcreate = document.getElementById('idmapelcreate');
        mapelcreate.addEventListener('change',function(){setSelect(this.value,'lokalnyacreate')});

        mapel = document.getElementById('idmapel');
        mapel.addEventListener('change',function(){setSelect(this.value,'lokalnya')});
    }
    function setSelect(id,selectlokal) {
        lokal = listLokal[id];
        html="";
        lokalSelek = document.getElementById(selectlokal);
        for(i in lokal){
            html+="<option value='"+lokal[i].id_lokal+"'>"+lokal[i].label+"</option>";
        }
        lokalSelek.innerHTML=html;
    }
</script>
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