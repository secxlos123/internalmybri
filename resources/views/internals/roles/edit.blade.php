@section('title','Dashboard')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Ubah Role </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/roles')}}">Manajemen Role</a>
                                        </li>
                                        <li class="active">
                                            Ubah Role
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if (\Session::has('error'))
                                             <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                            @endif
                                            <form class="form-horizontal" role="form" action="{{route('roles.update', $dataRole['id'])}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Nama Slug :</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="slug" value="{{ $dataRole['slug'] }}" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Nama Display :</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="name" value="{{ $dataRole['name'] }}">
                                                    </div>
                                                </div>
                                            
                                            <table class="table table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>List Menu</th>
                                                        <th class="text-center">Availability</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- <tr>
                                                        <td class="align-middle">Home</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="home" value="home">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Nasabah</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="nasabah" value="nasabah">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Properti</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="properti" value="properti">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">e-Form</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="eform" value="eform">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Developer</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="developer" value="developer">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Debitur</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="debitur" value="debitur">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Penjadwalan</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="jadwal" value="jadwal">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Kalkulator</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="kalkulator" value="kalkulator">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Tracking</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="tracking" value="tracking">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Pihak ke-3</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="pihak3" value="pihak3">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Manajemen User</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="user" value="user">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Manajemen Role</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-single checkbox-primary text-center">
                                                                <input type="checkbox" id="role" value="role">
                                                                <label></label>
                                                            </div>
                                                        </td>
                                                    </tr> -->
                                                    <tr>
                                                        <td class="align-middle">Home</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="home" value="true" name="home"
                                                                @if($dataRole['permissions']){{ ($dataRole['permissions']['home'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="home">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Nasabah</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="nasabah" value="true" name="nasabah" @if($dataRole['permissions']){{ ($dataRole['permissions']['nasabah'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="nasabah">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Properti</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="properti" value="true" name="properti" @if($dataRole['permissions']){{ ($dataRole['permissions']['properti'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="properti">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">e-Form</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="eform" value="true" name="eform" @if($dataRole['permissions']){{ ($dataRole['permissions']['e-form'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="eform">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Developer</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="developer" value="true" name="developer" @if($dataRole['permissions']){{ ($dataRole['permissions']['developer'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="developer">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Debitur</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="debitur" value="true" name="debitur" @if($dataRole['permissions']){{ ($dataRole['permissions']['debitur'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="debitur">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Penjadwalan</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="jadwal" value="true" name="jadwal" @if($dataRole['permissions']){{ ($dataRole['permissions']['penjadwalan'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="jadwal">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Kalkulator</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="kalkulator" value="true" name="kalkulator" @if($dataRole['permissions']){{ ($dataRole['permissions']['kalkulator'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="kalkulator">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Tracking</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="tracking" value="true" name="tracking" @if($dataRole['permissions']){{ ($dataRole['permissions']['tracking'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="tracking">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Pihak ke-3</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="pihak3" value="true" name="pihak3" @if($dataRole['permissions']){{ ($dataRole['permissions']['pihak-ke-3'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="pihak3">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Manajemen User</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="user" value="true" name="user" @if($dataRole['permissions']){{ ($dataRole['permissions']['manajemen-user'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="user">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Manajemen Role</td> 
                                                        <td>
                                                            <div class="checkbox checkbox-primary text-center">
                                                                <input type="checkbox" id="role" value="true" name="role" @if($dataRole['permissions']){{ ($dataRole['permissions']['manajemen-role'] == 'true') ? 'checked' : ''}} @endif>
                                                                <label for="role">Check</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="pull-right">
                                                <a href="#" onclick="goPrev()" class="btn btn-default waves-light waves-effect w-md">Kembali</a>
                                                <button type="submit" class="btn btn-success waves-light waves-effect w-md" data-toggle="modal" id="save"><i class="mdi mdi-content-save"></i> Ubah</button>
                                            </div>

                                            </form>
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
    $(document).ready(function () {
        $('#btnSave').click(function() {
          //condition checkbox should check only for editor and spt
            checked = $("input[type=checkbox]:checked").length;

            if(!checked) {
              alert("Oops..","Anda harus memilih setidaknya 1 kategori naskah", "error");
              return false;
            }
          });
    });
</script>