@section('title','My BRI - Penjadwalan')
@include('internals.layouts.head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Agenda </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="active">
                                Penjadwalan
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->



            <div class="row">
                <div class="col-lg-12">

                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-danger btn-block waves-effect m-t-20 waves-light">
                                            <i class="fa fa-plus"></i> Atur Jadwal
                                        </a>
                                        <div id="external-events" class="m-t-20">
                                            <br>
                                            <p class="text-muted">Drag dan drop jadwal atau klik pada kalender</p>
                                            <div class="external-event bg-success" data-class="bg-success">
                                                <i class="mdi mdi-checkbox-blank-circle m-r-10 vertical-middle"></i>New Theme Release
                                            </div>
                                            <div class="external-event bg-info" data-class="bg-info">
                                                <i class="mdi mdi-checkbox-blank-circle m-r-10 vertical-middle"></i>My Event
                                            </div>
                                            <div class="external-event bg-warning" data-class="bg-warning">
                                                <i class="mdi mdi-checkbox-blank-circle m-r-10 vertical-middle"></i>Meet manager
                                            </div>
                                            <div class="external-event bg-purple" data-class="bg-purple">
                                                <i class="mdi mdi-checkbox-blank-circle m-r-10 vertical-middle"></i>Create New theme
                                            </div>
                                        </div>

                                        <!-- checkbox -->
                                        <div class="checkbox checkbox-custom m-t-40">
                                            <input id="drop-remove" type="checkbox" checked="">
                                            <label for="drop-remove">
                                                Remove after drop
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col-->
                            <div class="col-md-9">
                                <div id="calendar"></div>
                            </div> <!-- end col -->
                        </div>  <!-- end row -->
                    </div>

                    <!-- BEGIN MODAL -->
                    <div class="modal fade none-border" id="event-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Agenda</h4>
                                </div>
                               <!--  <div class="modal-body p-20"></div> -->
                               <h1></h1>
<!--                                             <div class="row form-group">
                                    <div class="col-md-6">
                                        <label class="control-label">Title</label>
                                        <input type="text" class="form-control" readonly="" value="This is title">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">All day event</label>
                                        <input type="text" class="form-control" readonly="" value="Yes/No">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="control-label">Date Range With Time</label>
                                        <input type="text" class="form-control" readonly="" value="01/01/2015 1:30 PM - 01/01/2015 2:00 PM">
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">Timezone</label>
                                        <input type="text" class="form-control" readonly="" value="Timezone">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Repeat</label>
                                        <input type="text" class="form-control" readonly="" value="Repeat">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Owner</label>
                                        <input type="text" class="form-control" readonly="" value="Owner">
                                    </div>
                                </div>  -->
                                <div>
                                    <form role="form">
                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label class="control-label">Agenda</label>
                                                <input class="form-control form-white" placeholder="Enter No title" type="text" name="category-name"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Pilih Warna</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="primary">Primary</option>
                                                    <option value="warning">Warning</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="brown">Brown</option>
                                                    <option value="teal">Teal</option>
                                                    <option value="inverse">Inverse</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form>
                                                    <div class="form-group">
                                                        <label>Waktu</label>
                                                        <div>
                                                            <input type="text" class="form-control input-daterange-timepicker" name="daterange" value="01/01/2015 1:30 PM - 01/01/2015 2:00 PM"/>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group for-switch-btn">
                                                    <label>All day event: </label>
                                                        <input type="checkbox" id="switch1" checked switch="none"/>
                                                        <label class="csm-switch-btn" for="switch1" data-on-label="Yes"
                                                               data-off-label="No"></label>
                                                    </div>  -->              
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <!-- <div class="col-md-4">
                                                <label class="control-label">Timezone</label>
                                                <input class="form-control form-white" placeholder="Timezone" type="text" name="category-name"/>
                                            </div> -->
                                            <div class="col-md-6">
                                                <label class="control-label">Nasabah</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Never</option>
                                                    <option value="danger">Ever</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Developer</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Alex</option>
                                                    <option value="danger">Younglex</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label">Tempat</label>
                                                <textarea required="" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label">Description</label>
                                                <textarea required="" class="form-control"></textarea>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Edit</button>
                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>                                                
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Add Category -->
                    <div class="modal fade none-border" id="add-category">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Agenda</h4>
                                </div>
                                <div class="modal-body p-20">
                                    <form role="form">
                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label class="control-label">Judul</label>
                                                <input class="form-control form-white" placeholder="Enter No title" type="text" name="category-name"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Pilih Warna</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="primary">Primary</option>
                                                    <option value="warning">Warning</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="brown">Brown</option>
                                                    <option value="teal">Teal</option>
                                                    <option value="inverse">Inverse</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form>
                                                    <div class="form-group">
                                                        <label>Waktu</label>
                                                        <div>
                                                            <input type="text" class="form-control input-daterange-timepicker" name="daterange" value="01/01/2015 1:30 PM - 01/01/2015 2:00 PM"/>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group for-switch-btn">
                                                    <label>All day event: </label>
                                                        <input type="checkbox" id="switch1" checked switch="none"/>
                                                        <label class="csm-switch-btn" for="switch1" data-on-label="Yes"
                                                               data-off-label="No"></label>
                                                    </div> -->               
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <!-- <div class="col-md-4">
                                                <label class="control-label">Timezone</label>
                                                <input class="form-control form-white" placeholder="Timezone" type="text" name="category-name"/>
                                            </div> -->
                                            <div class="col-md-6">
                                                <label class="control-label">Nasabah</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Never</option>
                                                    <option value="danger">Ever</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Developer</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Alex</option>
                                                    <option value="danger">Younglex</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label">Tempat</label>
                                                <textarea required="" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label">Description</label>
                                                <textarea required="" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->
                </div>
                <!-- end col-12 -->
            </div> <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->
<!-- 
    <footer class="footer text-right">
        2016 © Zircos.
    </footer> -->

</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')