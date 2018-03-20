<ul id="rightSide" class="rightSide">
    <li class="notif-head clearfix">
        <h4>Notification</h4>
        <a href="javascript:void(0)" onclick="closeSide()" class="close-notif"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>
    </li>
    <li class="unread_notif">
        <table class="notification">
            @php( $unread = notificationsUnread() )
            @php( $count = count($unread) )
            @if($count > 0 )
                @php( $count = 0 )
                @foreach($unread as $value)
                    <tr class="line-notif {{ !empty($value['read_at']) ? 'read-notif' : '' }}" data-href="{{ $value['url'] }}">
                          <td>
                              <div class="notif-ico bg-success">
                                  <i class="fa fa-bell"></i>
                              </div>
                          </td>
                          <td>
                              <p class="notif-text"><span class="text-bold">{{ ucwords($value['data']['user_name']) }}</p>
                              <p class="title"><span class="text-bold"><strong>{{ $value['subject'] }}</strong></p>
                              <p class="time-text">{{ $value['created_at'] }}</p>
                          </td>
                      </tr>
                      @if( empty($value['read_at']) )
                        @php( $count += 1 )
                      @endif
                @endforeach
            @else
                <li class="all-msgs text-center">
                    <p class="m-0"><a>Tidak Ada Data Notifikasi</a></p>
                </li>
            @endif

        </table>

        <li class="all-msgs text-center" style="display: block;">
            <p class="m-0" style="display: block;"><a> &nbsp;</a></p>
        </li>
    </ul>
    </li>
</ul>

@push('scripts')
  <script type="text/javascript">
    $(".badge-edit").html("{{ $count }}");
  </script>
@endpush