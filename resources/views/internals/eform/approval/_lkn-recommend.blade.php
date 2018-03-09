<div class="row">
     <div class="panel-heading">
        <h4 class="panel-title">Rekomendasi</h4>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Rekomendasi AO :</label>
                <div class="col-md-7">
                    @php
                        $rekon = false;
                        if (isset($recontest)) {
                           if ($recontest == 1) {
                               $rekon = true;
                           }
                        }
                    @endphp
                        @if ($rekon)
                        <p class="form-control-static">{{$detail['recontest']['ao_recommended'] == 'yes' ? 'Ya' : 'Tidak'}}</p>
                        @else
                        <p class="form-control-static">{{$detail['visit_report']['recommended'] == 'yes' ? 'Ya' : 'Tidak'}}</p>
                        @endif
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
        </form>
    </div>
    </div>