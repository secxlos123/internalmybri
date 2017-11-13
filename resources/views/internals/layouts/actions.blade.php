@if (isset($edit))
	<a href="{!! $edit !!}" class="btn btn-icon waves-effect waves-light btn-teal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
		<i class="mdi mdi-pencil"></i>
	</a>
@endif

@if (isset($show))
	<a href="{!! $show !!}" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail">
		<i class="mdi mdi-eye"></i>
	</a>
@endif

@if (isset($showModal))
	<a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-info btn-view" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail" data-slug="{{$showModal['slug']}}" data-name="{{$showModal['name']}}" data-id="{{$showModal['id']}}">
		<i class="mdi mdi-eye"></i>
	</a>
@endif

@if (isset($delete))
	<a href="javascript:void(0)" class="btn btn-icon waves-effect waves-light btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" data-url="{!! $delete !!}">
		<i class="mdi mdi-delete"></i>
	</a>
@endif

	@if (isset($dispotition)  && $submited == false && $visited == false)
		<a href="{{url('/eform/dispotition/'.$dispotition['id'].'/'.str_replace(' ','-',$dispotition['ref_number']))}}" class="btn btn-icon waves-effect waves-light btn-teal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Disposisi">
			<i class="mdi mdi-loupe"></i>
		</a>
	@endif

@if (isset($screening))
	<a href="#" class="btn btn-icon waves-effect waves-light btn-info " data-toggle="tooltip" data-placement="top" title="" data-original-title="Screening">
	    <i class="mdi mdi-eye"></i>
	</a>
@endif

@if(isset($verified))
	@if ((isset($verification) && ($verified == false) && ($response_status != 'approve' || $response_status != 'unverified')))
	<a href="{!! $verification !!}" class="btn btn-icon waves-effect waves-light btn-info" data-original-title="Verification" title="Verification">
	    <i class="fa fa-check-square-o" aria-hidden="true"></i>
	</a>
	@endif

	@if (!empty($verified) && $verified == true)
	<span class="btn btn-icon waves-effect waves-light btn-orange">
	    Verified
	</span>
	@endif

	@if ((isset($lkn)) && ($visited == false))
	<a href="{!! $lkn !!}" class="btn btn-icon waves-effect waves-light btn-orange" data-original-title="Form LKN" title="Form LKN">
	    <i class="fa fa-file-text-o" aria-hidden="true"></i>
	</a>
	@endif
@endif

@if (isset($approve) && (!empty($visited)) && ($visited == true) && ($submited == false))
<a href="{{route('getApproval', $approve['id'])}}" class="btn btn-icon waves-effect waves-light btn-info " data-original-title="Approval" title="Approval">
    <i class="mdi mdi-check"></i>
</a>
@endif

@if (!empty($submited) && $submited == true)
	<span class="btn btn-icon waves-effect waves-light btn-orange">
	    Proses CLF
	</span>
@endif

@if (isset($prescreening_status))
	<a href="javascript:void(0);" id="btn-prescreening">
		<p class="text-success">{{$prescreening_result}}</p>
	</a>
@endif

@if ((isset($dispose_collateral)))
	<a href="{!! $dispose_collateral !!}" class="btn btn-icon waves-effect waves-light btn-info" data-original-title="Penugasan" title="Penugasan">
	    <i class="fa fa-user-plus" aria-hidden="true"></i>
	</a>
@endif

@if ((isset($approval_collateral)))
	<a href="{!! $approval_collateral !!}" class="btn btn-icon waves-effect waves-light btn-orange" data-original-title="Approval" title="Approval">
	    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
	</a>
@endif

<!-- @if ((isset($lkn_collateral)))
	<a href="{!! $lkn_collateral !!}" class="btn btn-icon waves-effect waves-light btn-info" data-original-title="Form LKN" title="Form LKN">
	    <i class="fa fa-file-text" aria-hidden="true"></i>
	</a>
@endif -->

@if ((isset($assignment_collateral)))
	<a href="{!! $assignment_collateral !!}" class="btn btn-icon waves-effect waves-light btn-orange" data-original-title="Lakukan OTS / Penolakan 
    Penugasan" title="Lakukan OTS / Penolakan 
    Penugasan">
	    <i class="fa fa-briefcase" aria-hidden="true"></i>
	</a>
@endif

@if ((isset($detail_collateral)))
	<a href="{!! $detail_collateral !!}" class="btn btn-icon waves-effect waves-light btn-info" data-original-title="Detail Informasi" title="Detail Informasi">
	    <i class="fa fa-info" aria-hidden="true"></i>
	</a>
@endif

@if ((isset($detail)))
	<a href="{!! $detail !!}" class="btn btn-icon waves-effect waves-light btn-info" data-original-title="Detail Informasi" title="Detail Informasi">
	    <i class="fa fa-info" aria-hidden="true"></i>
	</a>
@endif