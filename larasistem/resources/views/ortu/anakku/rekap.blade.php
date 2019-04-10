@extends('ortu.index')
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
                    {!! Form::open(['route' => ['getrekap',$id_siswa],'method'=>'post', 'class' => 'form-inline']) !!}
                   <div class="form-group">
                    {!!Form::select('idlokal',$listLokal,['0'=>'Lokal'],['class'=>'input-sm form-control','id'=>'idlokal'])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::select('idmapel',["0"=>"Mata Pelajaran"],null,['class'=>'input-sm form-control','id'=>'idmapel'])!!}
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
                        @if(count($nilai)<=0)
                            <h1>Tidak ada data rekap nilai yang bisa ditampilkan</h1>
                            <div class="col-sm-6">
                                    <canvas id="grafiknilai"></canvas>
                                    
                                </div>
                        @else
                            <div class="row m-b-sm p-md">
                                <dl class="dl-horizontal">
                                    <dt>Mata Pelajaran :</dt><dd>{{$mapel}}</dd>
                                    <dt>Nama Kelas:</dt><dd>{{$namaKelas}}</dd>
                                </dl>
                            </div>

                            <div class="row m-b-sm p-md">   
                                <div class="col-sm-6">            
                                    <table class="footable table table-hover" data-filtering="true">
                                    <thead>
                                        <tr>
                                            <th data-type="text">Judul</th>
                                            <th data-type="number">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($nilai as $data)
                                    <tr>
                                        <td>{{$data['judul']}}</td>
                                        <td>{{$data['nilai']}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>Rata-rata</td>
                                        <td>{{$rata}}</td>
                                    </tr>
                                    </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <canvas id="grafiknilai"></canvas>
                                    
                                </div>
                            </div>
                        @endif
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
<script src="{{url("assets/js/vendor/chartjs/Chart.min.js")}}"></script>
<script type="text/javascript">
    var dataChart = {!!$dataChart!!}
    var config = {
            type: 'line',
            data: {
                labels:dataChart.label,
                datasets: [{
                    fill: false,
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: dataChart.data,
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Grafik Perkembangan Nilai'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: false
                },
                legend:{
                    display: false
                },
                scales: {
                  xAxes: [{
                    display: true
                  }],
                  yAxes: [{
                    display: false
                  }],
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById("grafiknilai").getContext("2d");
            window.myLine = new Chart(ctx, config);
            idlokal = document.getElementById('idlokal');
            idlokal.addEventListener('change',function(){setSelect(this.value,'idmapel')});
        };
</script>
<script type="text/javascript">
    var listMapel = {!!$mapelDariLokalJSON!!}
    function setSelect(id,selectlokal) {
        var listMapelSelect = listMapel[id];
        html="";
        mapelSelek = document.getElementById(selectlokal);
        for(i in listMapelSelect){
            html+="<option value='"+listMapelSelect[i].idmapel+"'>"+listMapelSelect[i].label+"</option>";
        }
        mapelSelek.innerHTML=html;
    }
</script>
@endsection