
    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <a href="{{route('dashboard')}}" class="logo">
                        <span>
                            <img src="{{asset('assets/images/logo.png')}}" alt="" height="40">
                        </span>
                        <i>
                            <img src="{{asset('assets/images/logo_sm.png')}}" alt="" height="40">
                        </i>
                    </a>
                </div>
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            
                            <li class="hidden-xs">
                                <p>Selamat Datang di Aplikasi Dashboard My BRI. Untuk Bantuan Hubungi 012345678.</p>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <fieldset hidden>
                                <li>
                                    <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                        <i class="mdi mdi-bell"></i>
                                        <span class="badge up bg-success">4</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                        <li>
                                            <h5>Notifikasi</h5>
                                        </li>
                                        <li>
                                            <a href="#" class="user-list-item">
                                                <div class="icon bg-info">
                                                    <i class="mdi mdi-account"></i>
                                                </div>
                                                <div class="user-desc">
                                                    <span class="name">Pendaftaran Baru</span>
                                                    <span class="time">5 jam</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="user-list-item">
                                                <div class="icon bg-danger">
                                                    <i class="mdi mdi-comment"></i>
                                                </div>
                                                <div class="user-desc">
                                                    <span class="name">Pesan Baru</span>
                                                    <span class="time">1 hari</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="user-list-item">
                                                <div class="icon bg-warning">
                                                    <i class="mdi mdi-settings"></i>
                                                </div>
                                                <div class="user-desc">
                                                    <span class="name">Perubahan Pengaturan</span>
                                                    <span class="time">1 hari</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="all-msgs text-center">
                                            <p class="m-0"><a href="#">Lihat Semua Notifikasi</a></p>
                                        </li>
                                    </ul>
                                </li>
                            </fieldset>
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hai, {{$data['name']}}</h5>
                                    </li>
                                    <fieldset hidden>
                                        <li><a href="#"><i class="ti-user m-r-5"></i> Profil</a></li>
                                        <li><a href="#"><i class="ti-settings m-r-5"></i> Pengaturan</a></li>
                                    </fieldset>
                                    <li><a href="#" id="logout"><i class="ti-power-off m-r-5"></i> Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>