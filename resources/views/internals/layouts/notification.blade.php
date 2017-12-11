<li style="display: none;">
    <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
        <i class="mdi mdi-bell"></i>
        <span class="badge up bg-success"> 
                @if( Session::get('user')['contents']['role'] == 'pinca')
                    {{ count( notificationsUnread() ) }}
                @else
                    0
                @endif
        </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list" >
        <li>
            <h5>Notifikasi</h5>
        </li>
        @if(count(notificationsUnread()) > 0 )
            @foreach(notificationsUnread() as $value)
                    <li>
                        <a href="{{ url('/eform?ref_number='.$value['data']['ref_number'].'&ids='.$value['data']['eform_id'].'') }}" class="user-list-item list-notif">
                            <div class="icon bg-danger">
                                <i class="mdi mdi-comment"></i>
                            </div>
                            <div class="user-desc">
                                <span class="title"><strong>{{ $value['subject'] }}</strong></span>
                                <span class="name">{{ $value['data']['user_name'] }}<span class="ref_number" style="display: none;">{{ $value['data']['ref_number'] }}</span></span>
                                <span class="time">{{ $value['created_at'] }}</span>                            
                            </div>
                        </a>
                    </li>
            @endforeach
        @else
            <li class="all-msgs text-center">
                <p class="m-0"><a href="#">Tidak Ada Data Notifikasi</a></p>
            </li>
        @endif
        
        <li class="all-msgs text-center" style="display: none;">
            <p class="m-0" style="display: none;"><a href="#">Lihat Semua Notifikasi</a></p>
        </li>
    </ul>
</li>