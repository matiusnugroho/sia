<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                        @php
                                   $a=Auth::user();
                                    $src = is_null($a->pp)?url("img/default/default.png"):url('img/'.$a->username.'/'.$a->pp);
                                @endphp
                            <img alt="image" width="80" height="80" class="img-circle" src="{{$src}}" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->ortu->nama }}</strong>
                             </span> <span class="text-muted text-xs block">Orang Tua Siswa<b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="{{url('/profile')}}">Profile</a></li>
                                <li><a href="{{url('logout')}}">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SIA
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{url('/')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span</a>
                    </li>
                    
                    <li>
                        <a href="{{url('info')}}"><i class="fa fa-desktop"></i> <span class="nav-label">Info Siswa</span></a>
                    </li>
                    <li>
                        <a href="{{url('nilai')}}"><i class="fa fa-cubes"></i> <span class="nav-label">Nilai Siswa</span></a>
                    </li>
                </ul>

            </div>
        </nav>