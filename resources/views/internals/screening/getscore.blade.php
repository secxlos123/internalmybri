@section('title','My BRI - Prescreening')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Prescreening</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li class="active">
                                Prescreening
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_scoring">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        @if (\Session::has('success'))
                        <div class="alert alert-success">{{ \Session::get('success') }}</div>
                        @endif
                        <div class="card-box">
                            <div id="filter" class="m-b-15">
                                <div class="row">
                                    <div class="col-md-8">
                                            <input type="hidden" id="id" name="id" value="{!! $id !!}">
                                            <input type="hidden" id="countupload" name="countupload" value="2">


                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Score Pefindo / BI Checking:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control numericOnly required" id="pefindo_score" name="pefindo_score" maxlength="3" value="{{ isset($eform['pefindo_score']) ? $eform['pefindo_score'] : '' }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Keterangan Resiko :</label>
                                                <div class="col-sm-8">
                                                    <textarea id="ket_risk" name="ket_risk"  class="form-control required" rows="8" value="{{ isset($eform['ket_risk']) ? $eform['ket_risk'] : '' }}" required/>{{ isset($eform['ket_risk']) ? $eform['ket_risk'] : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Upload</label>
                                                <div class="col-sm-6">
                                                    <input type="file" data-placeholder="Tidak ada file" name="uploadscore"  id="uploadscore" accept=".pdf" required>
                                                    <div id="tambah">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="button" class="btn btn-save"  value=" + " id="addupload"></input>
                                                    <input type="button" class="btn btn-save hide"  value=" - " id="removeupload"></input>
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20" id="btn-save"><i class="mdi mdi-content-save"></i>Submit </button>

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
    @include('internals.layouts.footer')
    @include('internals.layouts.foot')
    <script type="text/javascript">
        $('#addupload').click(function() {
            var countupload = $("#countupload").val();
            var k = '<input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="uploadscore'+countupload+'"  id="uploadscore'+countupload+'" accept=".pdf" required>';
            $('#tambah').append(k);
            $("#countupload").val(parseInt(countupload)+1);

            child = $('#tambah').children();
            if (child.length >= 1) {
                $('#removeupload').removeClass('hide');
            }
            // when the add file button is clicked append
        });

        $('#removeupload').click(function() {
            var countupload = $("#countupload").val();
            $("#countupload").val(parseInt(countupload)-1);

            child = $('#tambah').children();
            child.last().remove();
            if (child.length <= 1) {
                $('#removeupload').addClass('hide');
            }
        });

        $("input[name=pefindo_score]").on('blur', function () {
            if ( $(this).val() >= 900 ) {
                $(this).val('900');

            }
        });

        $("#form_scoring").submit(function(){
            var formData = new FormData(this);
            $.ajax({
                url: "/scoring",
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    HoldOn.close();
                    alert(data['message']);
                    window.location.href = "/screening";
                },
                error: function (response) {
                    HoldOn.close();
                    alert('gagal');
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });

        $('#btn-save').on('click', function() {
            HoldOn.open(options);
        });
    </script>