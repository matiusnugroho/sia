<!DOCTYPE html>
<html>

<head>
    <link href="{{url('assets/css/bootstrap-tableonly.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/css/bootstrap-gridonly.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/css/themify-icons.css')}}" rel="stylesheet">
    <style type="text/css">
        .visible-print {
    display: block !important;
}

.hidden-print {
    display: none !important;
}
    </style>
</head>
<body>
<div class="container">
    <div class="row text-center"><h1>Rekap Nilai</h1></div>
    <div class="row">
        <div class="col-xs-8">
            <dl class="dl-horizontal">
                <dt>Kelas:</dt><dd>{{$lokal->kelas->kelas}}</dd>
                <dt>Tahun Ajaran:</dt><dd>{{$lokal->ta}}</dd>
                <dt>Semester:</dt><dd>{{$lokal->semester}}</dd>
            </dl>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <div class="widget style1 white-bg shadow"> 
                <div class="row">
                <div class="text-center">
                <h2><i class="ti-cup text-golden"></i> <span class="font-bold">{{$peringkatKelas}}/<xsall>{{$jmlSiswa}} siswa</xsall></span></h2>
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
        <div class="col-xs-6">
            <canvas id="grafiknilai"></canvas>
        </div>
    </div>
</div>
</body>
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
</html>