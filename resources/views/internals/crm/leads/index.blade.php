@section('title','MyBRI - Leads Marketing')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style media="screen">
  .panel-head{
    background-color: #00529C;
    color: #fff;
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    padding: 10px 20px;
  }
  .panel-head span{
    color: #f7941e;
  }
  .select2-selection__clear {
    display: none;
  }
  .input-group {
    width: 100%;
  }
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Leads</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Home MyBRI</a>
                            </li>
                            <li class="active">
                                Leads
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">{{ \Session::get('success') }}</div>
                    @endif
                    <div class="card-box ">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#kelolaan" data-toggle="tab" aria-expanded="true" id="kelolaansBtn">
                                                <span class="visible-xs"><i class="fa fa-users"></i></span>
                                                <span class="hidden-xs">Kelolaan</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#crossSell" data-toggle="tab" aria-expanded="true" id="leadsBtn">
                                                <span class="visible-xs"><i class="fa fa-exchange"></i></span>
                                                <span class="hidden-xs">Cross Sell</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#myBri" data-toggle="tab" aria-expanded="true" id="customersBtn">
                                                <span class="visible-xs"><i class="fa fa-check-square"></i></span>
                                                <span class="hidden-xs">My BRI</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#cpp" data-toggle="tab" aria-expanded="true" id="cppsBtn">
                                                <span class="visible-xs"><i class="fa fa-ban"></i></span>
                                                <span class="hidden-xs">CPP</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#referral" data-toggle="tab" aria-expanded="true" id="referralsBtn">
                                                <span class="visible-xs"><i class="fa fa-ban"></i></span>
                                                <span class="hidden-xs">Referral</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="kelolaan">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              <div id="kelolaans">
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="crossSell">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              <div class="col-md-6" style="margin-bottom:20px; padding-left:0px;">
                                                                <select class="form-control select2" name="" id="selectLeads">
                                                                  <option value="kpr">KPR</option>
                                                                  <option value="kkb">KKB</option>
                                                                </select>
                                                              </div>
                                                              <div id="leads" style="margin-top:60px;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="myBri">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              <div id="customers"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="cpp">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                          <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md m-b-20 addCpp">Tambah CPP</a>
                                                            <div class="row">
                                                              <div class="createNewCustomer col-md-6 form-horizontal hidden" style="margin-bottom:60px;">
                                                                <form id="newCustomer">
                                                                  <div class="form-group">
                                                                    <label class="col-md-4 control-label">Nama :</label>
                                                                    <div class="col-md-8">
                                                                      <div class="input-group">
                                                                        <input class="form-control" placeholder="" id="nama" required="" name="nama" type="text" value="" aria-required="true">
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label class="col-md-4 control-label">NIK :</label>
                                                                    <div class="col-md-8">
                                                                      <div class="input-group">
                                                                        <input class="form-control numericOnly" placeholder="" id="nik" required="" name="nik" type="text" value="" aria-required="true">
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label class="col-md-4 control-label">Email :</label>
                                                                    <div class="col-md-8">
                                                                      <div class="input-group">
                                                                        <input class="form-control" placeholder="" id="email" required="" name="email" type="email" value="" aria-required="true">
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label class="col-md-4 control-label">Telp :</label>
                                                                    <div class="col-md-8">
                                                                      <div class="input-group">
                                                                        <input class="form-control numericOnly" placeholder="" id="telp" required="" name="telp" type="text" value="" aria-required="true">
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label class="col-md-4 control-label">Alamat :</label>
                                                                    <div class="col-md-8">
                                                                      <div class="input-group">
                                                                        <textarea class="form-control" placeholder="" id="alamat" required="" name="alamat" type="text" value="" aria-required="true"></textarea>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="pull-right">
                                                                    <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" name="button" id="submitNewCustomer">Kirim</button>
                                                                  </div>
                                                                </form>
                                                              </div>
                                                              <div class="col-md-6"></div>
                                                            </div>
                                                            <div class="row">
                                                              <div id="cpps"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="referral">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              <div id="referrals"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.crm.leads.script')
