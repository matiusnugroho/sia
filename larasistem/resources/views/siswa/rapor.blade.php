@extends('siswa.index')
@section('additionstyle')
<link href="{{url('assets/css/plugins/footable/footable.standalone.min.css')}}" rel="stylesheet">
@endsection
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-sm-4">
                     {!! Form::open(['url' => 'rekapnilai/rapor','method'=>'get', 'class' => 'form-inline']) !!}
                            <div class="form-group">
                            {!!Form::select('idlokalRapor',$listLokal,['0'=>'Lokal'],['class'=>'input-sm form-control'])!!}
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-sm-8">
                                <dl class="dl-horizontal">
                                    <dt>Kelas:</dt><dd>{{$lokal->kelas->kelas}}</dd>
                                    <dt>Tahun Ajaran:</dt><dd>{{$lokal->ta}}</dd>
                                    <dt>Semester:</dt><dd>{{$lokal->semester}}</dd>
                                </dl>
                        </div>
</div>
<div class="wrapper wrapper-content">

                    <div class="row m-b-sm p-md">
                                {{-- <div class="col-sm-12 ">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-small btn-primary" href="{{url('rekapnilai/laporan/excel?idmapelExcel='.$idmapel.'&idlokalExcel='.$idlokal)}}"><i class="fa fa-file-excel-o"></i> Excel</a>
                                        <a class="btn btn-small btn-primary" href="{{url('rekapnilai/laporan/pdf?idmapelPDF='.$idmapel.'&idlokalPDF='.$idlokal)}}"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                    </div>
                                </div>  --}}  
                                @if(count($datarapor)>0)
                                <div class="col-sm-6">
                                <div class="widget style1 white-bg shadow"> 
                                    <div class="row">
                                    <div class="text-center">
                                    <h2><i class="ti-cup text-golden"></i> <span class="font-bold">{{$peringkatKelas}}/<small>{{$jmlSiswa}} siswa</small></span></h2>
                                            </div>                                    
                                    </div>
                                    <div class="row">          
                                    <table class="footable table table-hover margin bottom" data-filtering="false">
                                    <thead>
                                        <tr>
                                            <th data-type="text">Subjek</th>
                                            <th data-type="number">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datarapor as $data)
                                    <tr>
                                        <td>{{$data['label']}}</td>
                                        <td>{{$data['nilai']}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>Rata-rata</td>
                                        <td>{{$reratasemua}}</td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="widget style1 white-bg shadow">
                                
                                    <canvas id="grafiknilai"></canvas>
                                </div>
                                    </div>
                                @else
                                <div class="middle-box text-center animated fadeInUp">
                                <h2>Data tidak ada</h2>
                                </div>
                                @endif
                    </div>
        {{-- </div> --}}
</div>
@endsection
@section('jsmore')
<script src="{{url("assets/js/plugins/footable/footable.min.js")}}"></script>
<script src="{{url("assets/js/vendor/chartjs/Chart.min.js")}}"></script>
<script src="{{url("assets/js/vendor/chartjs/utils.js")}}"></script>
<script type="text/javascript">
    var color = Chart.helpers.color;
    var config = {
        type: 'radar',
        data: {
            labels: {!!$cjdataLabelsJson!!},
            datasets: [{
                label: "Nilai",
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                borderColor: window.chartColors.red,
                pointBackgroundColor: window.chartColors.red,
                data: {!!$cjdatasJson!!}
            }]
        },
        options: {
            responsive : true,
            title: {
                display: false
            },
            scale: {
              ticks: {
                beginAtZero: true
              }
            },
            legend:{
                display : false
            }
        }
    };

    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("grafiknilai"), config);
    };
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
    var dataChart =
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
    var listMapel =
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