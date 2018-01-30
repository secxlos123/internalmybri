<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft">
    <div id="sidebar-menu">
      <ul>
        <li class="menu-title">Navigasi Utama</li>
        <li><a href="{{('/')}}" class="waves-effect" ><i class="mdi mdi-home"></i> <span> Home MyBRI </span> </a>
        </li>
        @if(($data['role']=='ao') || ($data['role']=='admin-bri'))
        <li>
          <a href="{{route('customers.index')}}" class="waves-effect"><i class="mdi mdi-account-star"></i> <span> Profil Calon Debitur </span> </a>
        </li>
        @endif
        @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='cs-bri'))
        <!-- <li>
        <a href="properti.html" class="waves-effect"><i class="mdi mdi-city"></i> <span> Properti </span> </a>
      </li> -->
      @endif
      <li>
        @if(($data['role']=='ao') || ($data['role']=='other'))
        <a href="{{route('eform.index')}}" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span> Pengajuan Kredit </span></a>
        @elseif(($data['role']=='mp') || ($data['role']=='pinca'))
        <a href="{{route('eform.index')}}" class="waves-effect inline-block-menu"><i class="mdi mdi-file-document-box"></i> <span style="font-size: 9pt;"> Rekomendasi & Disposisi </span> </a>
        @elseif(($data['role']=='staff'))
        <a href="{{route('eform.index')}}" class="waves-effect inline-block-menu"><i class="mdi mdi-file-document-box"></i> <span> Pengajuan Kredit </span> </a>

        @endif
      </li>

      @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca'))
      <li class="treeview">
        <a href="#" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Mitra Kerjasama </span> </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{route('developers.index')}}" class="waves-effect"> <span> Mitra Kerjasama KPR</span> </a>
          </li>

        </ul>
      </li>
      <li>
        <a href="{{route('debitur.index')}}" class="waves-effect"><i class="mdi mdi-account-card-details"></i> <span>Profil Debitur </span> </a>
      </li>
      @endif
      @if($data['role']=='adk')
      <li>
        <a href="{{route('adk.index')}}" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Verifikasi ADK </span> </a>
      </li>
      <li>
        <a href="{{route('adk-histori.index')}}" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Riwayat Paket Kredit</span> </a>
      </li>
      @endif
      @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='staff'))
      <li>
        <a href="{{route('schedule.index')}}" class="waves-effect"><i class="mdi mdi-calendar-clock"></i> <span> Penjadwalan </span> </a>
      </li>
      <li>
        <a href="{{route('tracking.index')}}" class="waves-effect"><i class="mdi mdi-call-split"></i> <span> Tracking </span> </a>
      </li>
      @endif
      <li>
        <a href="{{route('calculator.index')}}" class="waves-effect"><i class="mdi mdi-calculator"></i> <span> Kalkulator </span> </a>
      </li>
      @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='cs-bri'))
      <!-- <li>
      <a href="{{route('third-party.index')}}" class="waves-effect"><i class="mdi mdi-numeric-3-box-multiple-outline"></i> <span> Pihak Ketiga </span> </a>
    </li> -->
    @endif

    @if($data['role']=='collateral')
    <li>
      <a href="{{route('collateral.index')}}" class="waves-effect"><i class="mdi mdi-city"></i> <span> Penilaian Agunan </span> </a>
    </li>
    @endif

    @if(($data['role']=='collateral-appraisal')|| ($data['role']=='ao'))
    <li>
      <a href="{{route('staff-collateral.index')}}" class="waves-effect"><i class="mdi mdi-city"></i><span> Penilaian Agunan </span> </a>
    </li>
    @endif

    @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca'))
    <li>
      <a href="{{route('developers.index')}}" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Developer </span> </a>
    </li>
    <li>
      <a href="{{route('debitur.index')}}" class="waves-effect"><i class="mdi mdi-account-card-details"></i> <span> Debitur </span> </a>
    </li>
    @endif
    @if($data['role']=='adk')
    <li>
      <a href="{{route('adk.index')}}" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Verifikasi ADK </span> </a>
    </li>
    @endif
    @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='staff'))
    <li>
      <a href="{{route('schedule.index')}}" class="waves-effect"><i class="mdi mdi-calendar-clock"></i> <span> Penjadwalan </span> </a>
    </li>
    <li>
      <a href="{{route('tracking.index')}}" class="waves-effect"><i class="mdi mdi-call-split"></i> <span> Tracking </span> </a>
    </li>
    @endif
    <li>
      <a href="{{route('calculator.index')}}" class="waves-effect"><i class="mdi mdi-calculator"></i> <span> Kalkulator </span> </a>
    </li>
    @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='cs-bri'))
    <!-- <li>
    <a href="{{route('third-party.index')}}" class="waves-effect"><i class="mdi mdi-numeric-3-box-multiple-outline"></i> <span> Pihak Ketiga </span> </a>
  </li> -->
  @endif

  @if($data['role']=='collateral')
  <li>
    <a href="{{route('collateral.index')}}" class="waves-effect"><i class="mdi mdi-city"></i> <span> Penilaian Agunan </span> </a>
  </li>
  @endif

  @if(($data['role']=='collateral-appraisal')|| ($data['role']=='ao'))
  <li>
    <a href="{{route('staff-collateral.index')}}" class="waves-effect"><i class="mdi mdi-city"></i><span> Penilaian Agunan </span> </a>
  </li>
  @endif

  @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='staff'))
  <li class="treeview">
    <a href="#" class="waves-effect"><i class="mdi mdi-check"></i> <span > Approval Perubahan </span> </a>
    <ul class="treeview-menu">
      <li>
        <a href="{{route('approveDeveloper')}}" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Developer </span> </a>
      </li>
      <!-- <li>
      <a href="{{route('approveThirdParty')}}" class="waves-effect"><i class="mdi mdi-numeric-3-box-multiple-outline"></i> <span> Pihak Ke-3 </span> </a>
    </li> -->
  </ul>
</li>
@endif
<!-- <li>
<a href="{{route('users.index')}}" class="waves-effect"><i class="mdi mdi-account-multiple"></i> <span> Manajemen User </span> </a>
</li>
<li>
<a href="{{route('roles.index')}}" class="waves-effect"><i class="mdi mdi-sitemap"></i> <span> Manajemen Role </span> </a>
</li> -->
@if(($data['role']=='prescreening'))
<li>
  <a href="{{ route('screening.index') }}" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span> Screening </span> </a>

</li>
@endif
<li>
  <a href="{{ route('referral.index') }}" class="waves-effect"><i class="mdi mdi-account-switch"></i> <span> Referal </span> </a>
</li>
<li class="treeview">
  <a href="#" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span > Report </span> </a>
  <ul class="treeview-menu">
    <li>
      <a href="{{ url('report/marketing') }}" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span>CRM Marketing</span> </a>
    </li>
    <li>
      <a href="{{ url('report/activity') }}" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span>CRM Activity</span> </a>
    </li>
  </ul>
</li>
<hr>
<li>
  <a href="#" id="signout" class="waves-effect"><i class="mdi mdi-logout"></i> <span> Keluar </span> </a>
</li>
</ul>
</div>
<div class="clearfix"></div>
</div>
</div>
