<div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="menu-title">Navigasi Utama</li>
                            @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='admin-bri'))
                            <li>
                                <a href="{{('/')}}" class="waves-effect" ><i class="mdi mdi-home"></i> <span> Home </span> </a>
                            </li>
                            @endif
                            @if(($data['role']=='ao') || ($data['role']=='admin-bri'))
                            <li>
                                <a href="{{route('customers.index')}}" class="waves-effect"><i class="mdi mdi-account-star"></i> <span> Nasabah </span> </a>
                            </li>
                            @endif
                            @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='cs-bri'))
                            <!-- <li>
                                <a href="properti.html" class="waves-effect"><i class="mdi mdi-city"></i> <span> Properti </span> </a>
                            </li> -->
                            @endif
                            @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='cs-bri'))
                            <li>
                            <a href="{{route('eform.index')}}" class="waves-effect"><i class="mdi mdi-file-document-box"></i> <span> e-Form </span> </a>
                            </li>
                            @endif
                            @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='admin-bri'))
                            <li>
                                <a href="{{route('developers.index')}}" class="waves-effect"><i class="mdi mdi-briefcase"></i> <span> Developer </span> </a>
                            </li>
                            @endif
                            @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='admin-bri'))
                           <!--  <li>
                                <a href="debitur.html" class="waves-effect"><i class="mdi mdi-account-card-details"></i> <span> Debitur </span> </a>
                            </li> -->
                            @endif
                            @if(($data['role']=='ao') || ($data['role']=='admin-bri'))
                            <!-- <li>
                                <a href="penjadwalan.html" class="waves-effect"><i class="mdi mdi-calendar-clock"></i> <span> Penjadwalan </span> </a>
                            </li> -->
                            @endif
                            @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='admin-bri'))
                            <!-- <li>
                                <a href="kalkultor.html" class="waves-effect"><i class="mdi mdi-calculator"></i> <span> Kalkulator </span> </a>
                            </li> -->
                            @endif
                            @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca'))
                           <!--  <li>
                                <a href="tracking.html" class="waves-effect"><i class="mdi mdi-call-split"></i> <span> Tracking </span> </a>
                            </li> -->
                            @endif
                            @if(($data['role']=='ao') || ($data['role']=='mp') || ($data['role']=='pinca') || ($data['role']=='admin-bri'))
                            <!-- <li>
                                <a href="pihak3.html" class="waves-effect"><i class="mdi mdi-numeric-3-box-multiple-outline"></i> <span> Pihak ke-3 </span> </a>
                            </li> -->
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
                            <hr>
                            <li>
                                <a href="#" id="signout" class="waves-effect"><i class="mdi mdi-logout"></i> <span> Log Out </span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>