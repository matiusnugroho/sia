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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->siswa->nama }}</strong>
                             </span> <span class="text-muted text-xs block">Siswa<b class="caret"></b></span> </span> </a>
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
                        <a href="{{url('/elearning')}}"><i class="fa fa-desktop"></i> <span class="nav-label">E-Learning</span><span class="ti-arrow-circle-down arrow"></span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cubes"></i> <span class="nav-label">Penilaian</span><span class="ti-arrow-circle-down arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{url('/rekapnilai')}}">
                                    <i class="fa fa-file-o"></i>Rekap Nilai
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/rekapnilai/laporan')}}">
                                    <i class="fa fa-file-o"></i>Rekap Nilai Per Kelas
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>