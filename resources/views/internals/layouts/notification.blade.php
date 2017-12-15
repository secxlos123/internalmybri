<li style="display: none;">
    <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
        <i class="mdi mdi-bell"></i>
        <span class="badge up bg-success"> 
            {{ count( notificationsUnread() ) }}
        </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list" >
        <li>
            <h5><strong>Notifikasi</strong></h5>
        </li>
        
        <li class="all-msgs text-center" style="display: block;">
            <p class="m-0" style="display: block;"><a> &nbsp;</a></p>
        </li>
    </ul>
</li>