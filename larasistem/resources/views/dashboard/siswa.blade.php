@extends('siswa.index')
@section('additionstyle')
<link rel="stylesheet" type="text/css" href="{{url('assets/css/vendor/weather-icons.min.css')}}">
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <h2>Dashboard</h2>
</div>
<div class="wrapper wrapper-content">
    <div class="middle-box text-center animated fadeInRightBig">
    <?php
    	$ti ="text-warning";
    ?>
    @if($salam=="pagi")
    <?php
    	$wi = "wi wi-day-cloudy";
    ?>
    @elseif($salam=="siang")
    <?php
    	$wi ="wi wi-day-sunny";
    ?>
    @elseif($salam=="sore")
    <?php
    	$wi="wi wi-day-fog";
    ?>
    @else
    <?php
    	$wi ="wi wi-night-clear";
    	$ti ="text-yellow";
    ?>
    @endif
        <h1 class="font-bold {{$ti}}"><i class="{{$wi}}"></i></h1>
        <h3 class="font-bold">Selamat {{$salam}}, {{ Auth::user()->siswa->nama}}</h3>
    </div>
</div>
@endsection