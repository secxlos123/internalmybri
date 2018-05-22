@section('title','MyBRI - Marketing')
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
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Marketing</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Home MyBRI</a>
                            </li>
                            <li class="active">
                                Marketing
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
                        <div id="filter" class="m-b-15">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-box">
                                        <form class="form-horizontal" role="form" id="filterDiv">

                                          <div class="form-group">
                                            <label class="col-sm-4 control-label">Periode :</label>
                                            <div class="col-sm-8">
                                              <select class="form-control" id="periode">
                                                <option selected="" value="" > Semua</option>
                                                <option value="January">Januari</option>
                                                <option value="February">Februari</option>
                                                <option value="March">Maret</option>
                                                <option value="April">April</option>
                                                <option value="May">Mei</option>
                                                <option value="June">Juni</option>
                                                <option value="July">Juli</option>
                                                <option value="August">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="October">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="December">Desember</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-sm-4 control-label">Produk :</label>
                                            <div class="col-sm-8">

                                              <select class="form-control" id="product">
                                                <option selected="" value="" > Semua</option>
                                                @foreach($product as $pr)
                                                <option value="{{$pr['product_name']}}">{{$pr['product_name']}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>

                                          <!-- <div class="form-group">
                                            <label class="col-sm-4 control-label">Tenaga Pemasar :</label>
                                            <div class="col-sm-8">
                                              <select class="form-control" id="status">
                                                <option selected="" value="" > Semua</option>
                                              </select>
                                            </div>
                                          </div> -->

                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                  <a href="{{url('marketing/create')}}" class="btn btn-orange waves-light waves-effect w-md">
                                    <div class="create-marketing">
                                      Create Marketing
                                    </div>
                                  </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#prospek" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-users"></i></span>
                                                <span class="hidden-xs">Prospek</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#onprogress" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-exchange"></i></span>
                                                <span class="hidden-xs">On Progress</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#deal" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-check-square"></i></span>
                                                <span class="hidden-xs">Done</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#batal" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-ban"></i></span>
                                                <span class="hidden-xs">Batal</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="prospek">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              @foreach($prospek as $p)
                                                              <?php
                                                              $time = strtotime($p['created_at']);
                                                              $bulan = date('F',$time);
                                                              ?>
                                                              <a href="{{url('/marketing_detail?id='.$p['id'])}}" class="product" data-product="{{$p['product_type']}}" data-periode="{{$bulan}}">
                                                                <div class="col-md-12">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-head">
                                                                      <div class="row">
                                                                        <div class="col-md-6">
                                                                          {{$p['product_type']}} - {{$p['nama']}}
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                          <div class="text-right">Rp. {{$p['target']}}</div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                      <div class="actvity_type">{{$p['activity_type']}}</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </a>
                                                              @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="onprogress">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              @foreach($onprogress as $o)
                                                              <?php
                                                              $time = strtotime($o['created_at']);
                                                              $bulan = date('F',$time);
                                                              ?>
                                                              <a href="{{url('/marketing_detail?id='.$o['id'])}}" class="product" data-product="{{$o['product_type']}}" data-periode="{{$bulan}}">
                                                                <div class="col-md-12">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-head">
                                                                      <div class="row">
                                                                        <div class="col-md-6">
                                                                          {{$o['product_type']}} - {{$o['nama']}}
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                          <div class="text-right">Rp. {{$o['target']}}</div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                      <div class="actvity_type">{{$o['activity_type']}}</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </a>
                                                              @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="deal">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              @foreach($done as $d)
                                                              <?php
                                                              $time = strtotime($d['created_at']);
                                                              $bulan = date('F',$time);
                                                              ?>
                                                              <a href="{{url('/marketing_detail?id='.$d['id'])}}" class="product" data-product="{{$d['product_type']}}" data-periode="{{$bulan}}">
                                                                <div class="col-md-12">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-head">
                                                                      <div class="row">
                                                                        <div class="col-md-6">
                                                                          {{$d['product_type']}} - {{$d['nama']}}
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                          <div class="text-right">Rp. {{$d['target']}}</div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                      <div class="actvity_type">{{$d['activity_type']}}</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </a>
                                                              @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="batal">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              @foreach($batal as $b)
                                                              <?php
                                                              $time = strtotime($b['created_at']);
                                                              $bulan = date('F',$time);
                                                              ?>
                                                              <a href="{{url('/marketing_detail?id='.$b['id'])}}" class="product" data-product="{{$b['product_type']}}" data-periode="{{$bulan}}">
                                                                <div class="col-md-12">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-head">
                                                                      <div class="row">
                                                                        <div class="col-md-6">
                                                                          {{$b['product_type']}} - {{$b['nama']}}
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                          <div class="text-right">Rp. {{$b['target']}}</div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                      <div class="actvity_type">{{$b['activity_type']}}</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </a>
                                                              @endforeach
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
<script type="text/javascript">
  $(document).ready(function(){
    // $('#periode').on('change', function(){
    //   console.log($(this).val());
    //   if($(".product").hasClass($(this).val()) == true){
    //     $(".product").addClass('hide');
    //     $("."+$(this).val()).removeClass('hide');
    //   } else if ($(this).val() == "") {
    //     $(".product").removeClass('hide');
    //   }
    // });
    //
    // $('#product').on('change', function(){
    //   console.log($(this).val());
    //   if($(".product").hasClass($(this).val()) == true){
    //     $(".product").hide();
    //     $("."+$(this).val()).show();
    //   } else if ($(this).val() == "") {
    //     $(".product").show();
    //   }
    // });


    $('#filterDiv').on("change keyup", function() {
      chkBox = { datatest: null };

      $(".product").hide().filter(function() {
        var rtnData = "";

        regExProduct 	= new RegExp($('#product').val().trim(), "ig");
        regExPeriode	= new RegExp($('#periode').val().trim(), "ig");
        // regExB 			= new RegExp($('#2').val().trim(), "ig");

        rtnData = (
          $(this).attr("data-product").match(regExProduct) &&
          $(this).attr("data-periode").match(regExPeriode)
        );

        //console.log(rtnData);
        return rtnData;
      }).show();
    });

  });
</script>
