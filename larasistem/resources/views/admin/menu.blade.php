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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">Mimin<b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="{{url('/profile')}}">Profile</a></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SIA
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{url('/')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cogs"></i><span class="nav-label">Pengaturan<span class="ti-arrow-circle-down arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{url('/profilsekolah')}}"><i class="fa fa-bank"></i><span class="nav-label">Profil Sekolah</span></a>
                            </li>
                            <li>
                                <a href="{{url('jurusan')}}"><i class="fa fa-plus"></i><span class="nav-label">Jurusan</span></a></li>
                            <li>
                                <a href="{{url('/jamajar')}}"><i class="fa fa-clock-o"></i><span class="nav-label">Jam Belajar</span></a>
                            </li>
                            <li>
                                <a href="{{url('/jadwal')}}"><i class="fa fa-calendar"></i><span class="nav-label">Penjadwalan</span></a>
                            </li>
                            <li>
                                <a href="{{url('/gurumatapelajaran/')}}"><i class="ti-id-badge"></i><span class="nav-label">Guru Mata Pelajaran</span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="{{url('/gurupengampu')}}"><i class="ti-user"></i><span class="nav-label">Guru Pengampu</span></a>
                                    </li>
                                    <li>
                                        <a href="{{url('/gurumatapelajaran')}}"><i class="ti-user"></i><span class="nav-label">Per Kelas</span></a>
                                    </li>
                                    <li>
                                        <a href="{{url('/gurumatapelajaran/set')}}"><i class="ti-settings"></i><span class="nav-label">Pengaturan</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('/tahunajaran')}}"><i class="fa fa-archive"></i><span class="nav-label">Data Tahun Ajaran</span></a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i><span class="nav-label">User<span class="ti-arrow-circle-down arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{url('/user')}}"><i class="fa fa-users"></i><span class="nav-label">Data User</span></a>
                            </li>
                            <li>
                                <a href="{{url('/user/create')}}"><i class="fa fa-plus"></i><span class="nav-label">Tambah User</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Guru</span><span class="ti-arrow-circle-down arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{url('/guru')}}"><i class="fa fa-users"></i><span class="nav-label">Data Guru</span></a>
                            </li>
                            <li>
                                <a href="{{url('/guru/create')}}"><i class="fa fa-plus"></i><span class="nav-label">Tambah Data Guru</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i><span class="nav-label">Siswa</span><span class="ti-arrow-circle-down arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{url('/siswa')}}"><i class="fa fa-users"></i><span class="nav-label">Data siswa</span></a>
                            </li>
                            <li>
                                <a href="{{url('/siswa/create')}}"><i class="fa fa-plus"></i><span class="nav-label">Tambah Data Siswa</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="ti-blackboard"></i><span class="nav-label">Lokal</span><span class="ti-arrow-circle-down arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{url('/lokal')}}"><i class="fa fa-university"></i><span class="nav-label">Data Lokal</span></a>
                            </li>
                            <li>
                                <a href="{{url('/lokal/create')}}"><i class="fa fa-plus"></i><span class="nav-label">Tambah Data Lokal</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="ti-book"></i><span class="nav-label">Mata Pelajaran</span><span class="ti-arrow-circle-down arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{url('/matapelajaran')}}"><i class="ti-book"></i><span class="nav-label">Daftar Mata Pelajaran</span></a>
                            </li>
                            <li>
                                <a href="{{url('/matapelajaran/create')}}"><i class="fa fa-plus"></i><span class="nav-label">Tambah Mata Pelajaran</span></a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{url('/pa')}}"><i class="fa fa-users"></i><span class="nav-label">Data Pembimbing Akademik</span></a>
                    </li>
                    <li>
                        <a href="{{url('/orangtua')}}"><i class="fa fa-users"></i><span class="nav-label">Data Orangtua Murid</span></a>
                    </li>
                   
                    {{-- <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="ti-arrow-circle-down arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="#">Third Level <span class="ti-arrow-circle-down arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                        </ul>
                    </li> --}}
                </ul>

            </div>
        </nav>