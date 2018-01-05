@section('title','My BRI - Daftar Profil Customer')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style>
.button {
    background-color: white; /* Green */
    border: 2px solid #555555;;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
}

.button1 {font-size: 20px;width:453.75px;height:167px;}
.button2 {
    background-color: white; /* Green */
    color: black;
    text-align: left;
    margin: 4px 2px;
    cursor: pointer;
}
.button2 {font-size: 15px;width:150px;height:70px;}

ul {
    list-style-type: none;
}

li {
    float: left;
}

li a {
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

</style>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                
                                <div class="page-title-box">
                                    <h4 class="page-title">MITRA KERJASAMA</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Mitra Kerjasama
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">{{ \Session::get('success') }}</div>
                        @endif
						<div class="row double">
                            <div class="col-sm-8">
								<ul id="menu-menu" class="btn-primary"><li id="menu-item-8228" class="btn-primary"><a href="/"><img src="http://www.animatedgif.net/arrowpointers/arrow1rightred_e0.gif"><b>HOME</b></a></li>
								<li id="menu-item-34093" class="btn-primary"><a href="http://indoakatsuki.net/anime/"><img src="http://www.animatedgif.net/arrowpointers/arrow1rightred_e0.gif"><b>MITRA KERJASAMA</b></a></li>
								<li id="menu-item-36667" class="btn-primary"><a href="http://indoakatsuki.net/download/"><img src="http://www.animatedgif.net/arrowpointers/arrow1rightred_e0.gif"><b>MAINTANCE</b></a></li>
								<li id="menu-item-8221" class="btn-primary"><a href="http://indoakatsuki.net/popular-anime/"><img src="http://www.animatedgif.net/arrowpointers/arrow1rightred_e0.gif"><b>HELP</b></a></li>
								</ul>
							</div>
						</div>
				
							<br>
							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-12 w3-content w3-section" style="max-width:1441px">
									  <img class="mySlides" src="/assets/images/mitra/frontend-mitra1.png" style="width:100%">
									  <img class="mySlides" src="/assets/images/mitra/frontend-mitra2.png" style="width:100%">
									</div>
								</div>
							</div>
							<br>
							<br>
							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-4 w3-content w3-section">
										 <img src="/assets/images/mitra/frontend-mitra3.png" style="width:100%">
									</div>
									<div class="col-sm-4 w3-content w3-section">
										 <img src="/assets/images/mitra/frontend-mitra3.png" style="width:100%">
									</div>								
									<div class="col-sm-4 w3-content w3-section">
										<div class="row">				
											<div class="col-sm-4 w3-content w3-section">
											<button class="button button1">MITRA KERJASAMA</button>
											</div>
										</div>	
										<br>
										<div class="row">				
											<div class="col-sm-4 w3-content w3-section">
											<button class="button button1">MAINTENANCE DATA MITRA KERJASAMA</button>
											</div>
										</div>	
									</div>
								</div>
							</div>
							<br>
							<br>
							
							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-4 w3-content w3-section">
										 <button class="button button1">DAFTAR MITRA KERJASAMA BRI</button>
									</div>
									<div class="col-sm-4 w3-content w3-section">
										 <button class="button button1">PROMOSI BRI</button>
									</div>								
									<div class="col-sm-4 w3-content w3-section">
										 <button class="button button1">BANTUAN</button>
									</div>
								</div>
							</div>
			
						<div id="mitra_kerjasama">
						</div>
                    </div>
                </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot') 

<script type="text/javascript">
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 2 seconds
}

    var table1 = $('#datatable').DataTable({
            searching: false,
            "language": {
                "emptyTable": "No data available in table"
            }
        });

    $(document).on('click', "#btn-filter", function(){
        table1.destroy();
        reloadData1($('#nik').val(), $('#customer_name').val(), $('.cities').val());
      })

    function reloadData1(nik, customer_name, city_id)
      {
        table1 = $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "searching": false,
            "ajax" : {
                url : '/datatables/customers',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.city_id = city_id;
                    d.nik = nik;
                    d.name = customer_name;
                }
            },
            "aoColumns" : [
                { data: "nik", name: 'nik' },
                { data: "name", name: 'name' },
                { data: "email", name: 'email' },
                { data: "city_id", name: 'city_id' },
                { data: "mobile_phone", name: 'mobile_phone' },
                { data: "gender", name: 'gender' },
                { data: "application_status", name: 'application_status', bSortable: false, bSearchable: false },
                { data: "action", name: 'action', bSortable: false },
            ],
        });
      }

    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });

        // var table = $('#datatable').dataTable({
        //     "processing": true,
        //     "serverSide": true,
        //     "ajax" : {
        //         url : '/datatables/customers',
        //         data : function(d, settings){
        //             var api = new $.fn.dataTable.Api(settings);

        //             d.page = Math.min(
        //                 Math.max(0, Math.round(d.start / api.page.len())),
        //                 api.page.info().pages
        //             );

        //             d.office_id = $('.offices').val();
        //         }
        //     },
        //     "aoColumns" : [
        //         { data: "nik", name: 'nik' },
        //         { data: "name", name: 'name' },
        //         { data: "email", name: 'email' },
        //         { data: "city", name: 'city' },
        //         { data: "phone", name: 'phone' },
        //         { data: "gender", name: 'gender' },
        //         { data: "action", name: 'action', bSortable: false },
        //     ],
        // });

        // $('#btn-filter').on('click', function () {
        //     table.fnDraw();
        });

    // TableManageButtons.init();
</script>