@extends('admin.index')
@section('title')- Dashboard @endsection
@section('additionstyle')
<link rel="stylesheet" type="text/css" href="{{url('assets/css/vendor/weather-icons.min.css')}}">
@section('isi')
@section('isi')
			<div class="row  border-bottom white-bg dashboard-header">
                <h2>Dashboard</h2>
            </div>
<div class="wrapper wrapper-content">
<div class="row">
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
        <h3 class="font-bold">Selamat {{$salam}}, Admin</h3>
    </div>
</div>
</div>
<div class="row animated fadeInUp">
            <div class="col-lg-3">
                <div class="widget style1 white-bg shadow">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="ti-user fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Guru </span>
                                <h2 class="font-bold">{{$guru}}</h2>
                                <span>Aktif</span>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 white-bg shadow">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="ti-user fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Siswa </span>
                            <h2 class="font-bold">{{$siswa}}</h2>
                            <span>Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 white-bg shadow">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="ti-blackboard fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Lokal </span>
                            <h2 class="font-bold">{{$lokal}}</h2>
                            <span>TA {{$ta->ta}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 white-bg shadow">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="ti-file fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Mata Pelajaran </span>
                            <h2 class="font-bold">{{$mataPelajaran}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection