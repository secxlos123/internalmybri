<div class="row">
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>Foto KTP</p>
        </div>
    </div>
    @if(($detail['customer']['personal']['status']) == 2))
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['customer']['couple_identity'])){{$detail['customer']['couple_identity']}}@endif" class="img-responsive">
            <p>Foto KTP Pasangan</p>
        </div>
    </div>
    @endif
</div>