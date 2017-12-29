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
                            <p>Selamat Datang di Aplikasi My BRI. Untuk Bantuan Hubungi <b>consumer.support@corp.bri.co.id</b>.</p>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" onclick="openSide()" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <span class="badge up bg-success"> 
                                    {{ count( notificationsUnread() ) }}
                                </span>
                            </a>
                        </li>
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
                    @include('internals.layouts.notification')  
                </div>
            </div>
        </div>