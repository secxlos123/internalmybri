<li>
    <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
        <i class="mdi mdi-bell"></i>
        <span class="badge up bg-success"> 
                @if(branchs()['role'] == 'pinca')
                    {{ count( getNotification() ) }}
                @endif
        </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
        <li>
            <h5>Notifikasi</h5>
        </li>
         @foreach(getNotification() as $value)
            @if($value['role_name'] == 'pinca')
                <li>
                    <a href="{{route('eform.index')}}" class="user-list-item">
                        <div class="icon bg-danger">
                            <i class="mdi mdi-comment"></i>
                        </div>
                        <div class="user-desc">
                            <span class="title"><strong>{{ $value['subject'] }}</strong></span>
                            <span class="name">{{ $value['data']['user_name'] }}</span>
                            <span class="time">{{ $value['created_at'] }}</span>
                        </div>
                    </a>
                </li>
            @endif
        @endforeach
        
        <li class="all-msgs text-center">
            <p class="m-0"><a href="#">Lihat Semua Notifikasi</a></p>
        </li>
    </ul>
</li>    