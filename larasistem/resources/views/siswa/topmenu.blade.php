@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp
<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Sistem Informasi Akademik SMAN Pintar</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary" id="unreadBadge">{{$unreadBade}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts" id="notifContainer">
                    @foreach($notif as $notif)
                        @php 
                            $class=null; 
                            $lama = Carbon::createFromFormat('Y-m-d H:i:s', $notif->created_at)->diffForHumans();
                        @endphp
                        @if($notif->read_at!=null)
                            @php $class="text-muted"; @endphp
                        @else
                            @php $class="text-primary"; @endphp
                        @endif

                        <li>
                            <a href="{{url('notifikasi/'.$notif->id)}}" id="{{$notif->id}}" class="link-notif">
                                <div class="{{$class}}">
                                    <i class="fa fa-envelope fa-fw"></i> {{$notif->data['pesan']}}
                                    <span class="pull-right text-muted small">{{$lama}}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                        <li class="divider"></li>
                        <li>
                            <a href="{{url('notifikasi')}}">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i>Lihat semua notifikasi
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="{{route('logout')}}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>