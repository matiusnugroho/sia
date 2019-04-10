<!DOCTYPE html>
<html>

<head>
    <link href="{{url('assets/css/bootstrap-tableonly.css')}}" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
<h2>Mata Pelajaran : {{$mapelnamanya}}</h2>
<h2>Kelas : {{$namaKelas}}</h2>
<p>Rata-rata kelas : {{$rataKelas}}</p>

<table class="table table-bordered">
<thead>
    <tr>
        <th>{{$kolompertama['nis']}}</th>
        <th>{{$kolompertama['nama']}}</th>
        <?php
            $nilai = $kolompertama['nilai'];
        ?>
        @foreach($nilai as $n)
            <th>{{$n}}</th>
        @endforeach
        <th>{{$kolompertama['rerata']}}</th>
    </tr>
</thead>
<tbody>
@foreach($kolom as $data)
<tr>
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
</body>
</html>