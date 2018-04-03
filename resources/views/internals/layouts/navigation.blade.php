<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft">
    <div id="sidebar-menu">
      <ul>
        <li class="menu-title">Navigasi Utama</li>
        <li><a href="{{('/')}}" class="waves-effect" ><i class="mdi mdi-home"></i> <span> Home MyBRI </span> </a></li>
        @if(($data['role_user']=='ao') || ($data['role_user']=='fo') || ($data['role_user']=='mp') || ($data['role_user']=='amp') || ($data['role_user']=='pinca') || ($data['role_user']=='pincasus'))
        <li><a href="{{('/crm_dashboard')}}" class="waves-effect" ><i class="mdi mdi-home"></i> <span> CRM Dashboard </span> </a></li>
        @endif
        @if(($data['role_user']=='ao') || ($data['role_user']=='fo'))
        <li><a href="{{('/leads')}}" class="waves-effect" ><i class="mdi mdi-home"></i> <span> Leads </span> </a></li>
        @endif
        @if(($data['role_user']=='ao') || ($data['role_user']=='fo'))
        <li><a href="{{('/marketing')}}" class="waves-effect" ><i class="mdi mdi-home"></i> <span> Marketing </span> </a></li>
        @endif
        </li>
        @if(($data['role']=='ao') || ($data['role']=='admin-bri') || ($data['role']=='mp')|| ($data['role']=='pinca')||($data['role']=='other') || ($data['role']=='superadmin'))
        <li>
          <a href="{{route('customers.index')}}" class="waves-effect"><i class="mdi mdi-account-star"></i> <span> Profil Calon Debitur </span> </a>
        </li>
        @endif
        @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='amp') || ($data['role']=='pinca') || ($data['role']=='pincasus') || ($data['role']=='wapincasus') || ($data['role']=='cs-bri') || ($data['role']=='superadmin'))
        @endif
      <li>
        @if(($data['role']=='ao') || ($data['role']=='superadmin'))
        <a href="{{route('eform.index')}}" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span> Pengajuan Kredit </span></a>
        @elseif(($data['role']=='mp') || ($data['role']=='amp') || ($data['role']=='pinca') || ($data['role']=='pincasus') || ($data['role']=='wapincasus') || ($data['role']=='pincapem'))
        <a href="{{route('eform.index')}}" class="waves-effect inline-block-menu"><i class="mdi mdi-file-document-box"></i> <span style="font-size: 9pt;"> Rekomendasi & Disposisi </span> </a>
        @elseif(($data['role']=='staff')||($data['role']=='other'))
        <a href="{{route('eform.index')}}" class="waves-effect inline-block-menu"><i class="mdi mdi-file-document-box"></i> @if(($data['role']=='staff'))<span> Tambah Referral </span>@else <span> Pengajuan Kredit </span>  @endif </a>

        @endif
      </li>
      @if (($data['role']=='superadmin'))
        <li>
          <a href="{{route('eform.indexadmin')}}" class="waves-effect inline-block-menu"><i class="mdi mdi-file-document-box"></i> <span style="font-size: 9pt;"> Rekomendasi & Disposisi </span> </a>
        </li>
      @endif

      @if(($data['role']=='staff') || ($data['role']=='superadmin'))
      <li class="treeview">
        <a href="#" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Mitra Kerjasama </span> </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{route('developers.index')}}" class="waves-effect"> <span> Mitra Kerjasama KPR</span> </a>
          </li>

        </ul>
      </li>
      @endif
      @if(($data['role']=='ao')||($data['role']=='mp')||($data['role']=='pinca') || ($data['role']=='superadmin'))
      <li>
        <a href="{{route('debitur.index')}}" class="waves-effect"><i class="mdi mdi-account-card-details"></i> <span>Profil Debitur </span> </a>
      </li>
      @endif
      @if($data['role']=='adk' || $data['role']=='spvadk')
      <li>
        <a href="{{route('adk.index')}}" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Verifikasi ADK </span> </a>
      </li>
      <li>
        <a href="{{route('adk-histori.index')}}" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Riwayat Paket Kredit</span> </a>
      </li>
      @endif
      @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='amp') || ($data['role']=='pinca') || ($data['role']=='pincasus') || ($data['role']=='wapincasus') || ($data['role']=='superadmin'))
      <li>
        <a href="{{route('schedule.index')}}" class="waves-effect"><i class="mdi mdi-calendar-clock"></i> <span> Penjadwalan </span> </a>
      </li>
      @endif
      @if (($data['role']=='ao') || ($data['role']=='other') || ($data['role']=='staff') || ($data['role']=='superadmin'))
      <li>
        <a href="{{route('tracking.index')}}" class="waves-effect"><i class="mdi mdi-call-split"></i> <span> Tracking </span> </a>
      </li>
      @endif
      <li class="treeview">
        <a href="#" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span > Kalkulator </span> </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{route('calculator.index')}}" class="waves-effect"><i class="mdi mdi-calculator"></i> <span> Kal. Kredit</span> </a>
          </li>

          <li>
            <a href="{{route('calculatordplk.index')}}" class="waves-effect"><i class="mdi mdi-calculator"></i> <span> Kal. DPLK</span> </a>
          </li>
        </ul>
      </li>

    @if(($data['role']=='collateral') || ($data['role']=='superadmin'))
    <li>
      <a href="{{route('collateral.index')}}" class="waves-effect"><i class="mdi mdi-city"></i> <span>@if($data['role']=='superadmin')
      Manager Agunan @else
      Penilaian Agunan
      @endif</span> </a>
    </li>
    @endif

    @if(($data['role']=='collateral-appraisal')|| ($data['role']=='ao') || ($data['role']=='superadmin'))
    <li>
      <a href="{{route('staff-collateral.index')}}" class="waves-effect"><i class="mdi mdi-city"></i><span> Penilaian Agunan </span> </a>
    </li>
    @endif
 @if(($data['role']=='ao') || ($data['role']=='admin-bri'))
	<li class="treeview">
		<a href="#" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span > Mitra </span> </a>
			<ul class="treeview-menu">
				<li>
					<a href="{{route('mitra_list.index')}}" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span> Mitra List </span> </a>
				</li>
				<li>
					<a href="{{route('calon_mitra.index')}}" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span> Calon Mitra </span> </a>
				</li>
			</ul>
		</a>
	</li>
@endif
  @if(($data['role']=='staff') || ($data['role']=='superadmin'))
  <li class="treeview">
    <a href="#" class="waves-effect"><i class="mdi mdi-check"></i> <span > Approval Perubahan </span> </a>
    <ul class="treeview-menu">
      <li>
        <a href="{{route('approveDeveloper')}}" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Developer </span> </a>
      </li>
  </ul>
</li>
@endif

@if(($data['role']=='prescreening') || ($data['role']=='superadmin'))
<li>
  <a href="{{ route('screening.index') }}" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span> Screening </span> </a>

</li>
@endif
@if($data['role']=='superadmin')
<li>
  <a href="{{ route('auditrail.index') }}" class="waves-effect"><i class="mdi mdi-clipboard-text"></i> <span> Audit-Trail </span> </a>

</li>
@endif

@if($data['role_user']=='cs')
<li>
  <a href="{{ route('referral.index') }}" class="waves-effect"><i class="mdi mdi-account-switch"></i> <span> Referal </span> </a>
</li>
@endif

@if($data['role_user'] != 'ao' || $data['role_user'] != 'fo' || $data['role_user'] != 'mantri' || $data['role_user'] != 'cs' || $data['role_user'] != 'ro')
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
@endif

@if($data['role_user'] == 'amp' || $data['role_user'] == 'mp' || $data['role_user'] == 'pincapem' || $data['role_user'] == 'pinca')
<li>
  <a href="{{ url('disposisi-referral') }}" class="waves-effect"><i class="mdi mdi-account-switch"></i> <span> Disposisi Referal </span> </a>
</li>
@endif


<hr>
<li>
  <a href="#" id="signout" class="waves-effect"><i class="mdi mdi-logout"></i> <span> Keluar </span> </a>
</li>
</ul>
</div>
<div class="clearfix"></div>
</div>
</div>
