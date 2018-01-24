<style>
	.bottom-margin {
		margin-bottom:3px;
	}
</style>
@if (isset($edit))
	<a href="{!! $edit !!}" class="btn btn-icon waves-effect waves-light btn-teal bottom-margin" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit">
		<i class="mdi mdi-pencil"></i>
	</a>
@endif

@if (isset($show))
	<a href="{!! $show !!}" class="btn btn-icon waves-effect waves-light btn-info bottom-margin" data-toggle="tooltip" data-placement="top" title="Lihat Detail" data-original-title="Lihat Detail">
		<i class="mdi mdi-eye"></i>
	</a>
@endif

@if (isset($showModal))
	<a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-info btn-view bottom-margin" data-toggle="tooltip" data-placement="top" title="Lihat Detail" data-original-title="Lihat Detail" data-slug="{{$showModal['slug']}}" data-name="{{$showModal['name']}}" data-id="{{$showModal['id']}}">
		<i class="mdi mdi-eye"></i>
	</a>
@endif

@if (isset($delete))
	<a href="javascript:void(0)" class="btn btn-icon waves-effect waves-light btn-danger btn-delete bottom-margin" data-toggle="tooltip" data-placement="top" title="Hapus" data-original-title="Hapus" data-url="{!! $delete !!}">
		<i class="mdi mdi-delete"></i>
	</a>
@endif

@if (isset($dispotition)  && $submited == false && $visited == false)
	@php ( $title = ( $dispotition['ao_id'] == NULL || $dispotition['ao_id'] == '' ) ? 'Disposisi' : 'Re-Disposisi' )
	<a href="{{url('/eform/dispotition/'.$dispotition['id'].'/'.str_replace(' ','-',$dispotition['ref_number']))}}" class="btn btn-icon waves-effect waves-light btn-teal bottom-margin" data-toggle="tooltip" data-placement="top" title="{{ $title }}" data-original-title="{{ $title }}">
		<i class="mdi mdi-loupe"></i>
	</a>
@endif

@if (isset($screening))
	<a href="#" class="btn btn-icon waves-effect waves-light btn-info  bottom-margin" data-toggle="tooltip" data-placement="top" title="Screening" data-original-title="Screening">
	    <i class="mdi mdi-eye"></i>
	</a>
@endif

@if(isset($verified))
	@if ((isset($verification) && ($verified == false)))
		@if($response_status == 'unverified')
			<a href="{!! $reverification !!}" class="btn btn-icon waves-effect waves-light btn-pastel bottom-margin" data-original-title="Resend Verification" title="Resend Verification">
			    <i class="fa fa-reply" aria-hidden="true" style="color: white;"></i>
		    </a>
		@endif

		<a href="{!! $verification !!}" class="btn btn-icon waves-effect waves-light btn-pastel bottom-margin {{($response_status == 'unverified') ? 'disabled' : ''}}" data-original-title="Verification" title="Verification" style="{{($response_status == 'unverified') ? 'pointer-events: none;cursor: default; display: none;' : ''}}">
		    <i class="fa fa-check-square-o" style="color: white;" aria-hidden="true"></i>
		</a>
	@endif

	@if (!empty($verified) && $verified == true)
		<span class="waves-effect waves-light bottom-margin" data-original-title="Verified" title="Verified" style="width: 35px;text-align: center;cursor: default;">
		    <i class="fa fa-check-circle fa-2x" style="color: orange;" aria-hidden="true" title="Verified"></i>
		</span>
		<a href="{!! $preview !!}" class="btn btn-icon waves-effect waves-light btn-pastel bottom-margin" data-original-title="Verification" title="Detail Verification">
		    <i class="fa fa-eye" aria-hidden="true" style="color: white;"></i>
		</a>
	@endif

	@if ((isset($lkn)) && ($visited == false))
		<a href="{!! $lkn !!}" class="btn btn-icon waves-effect waves-light btn-pastel bottom-margin" data-original-title="Form LKN" title="Form LKN">
		    <i class="fa fa-file-text-o" style="color: white;" aria-hidden="true"></i>
		</a>
	@endif

@endif

@if (!empty($approve_adk))
	<a href="{{route('getApprove', $approve_adk['eform_id'])}}" class="btn btn-icon waves-effect waves-light btn-info bottom-margin " data-original-title="View" title="View-Detail">
	    <i class="mdi mdi-eye"></i>
	</a>
@endif

@if (!empty($detail_adk))
	<a href="{{route('getDetailADK', $detail_adk)}}" class="btn btn-icon waves-effect waves-light btn-info bottom-margin " data-original-title="View" title="View-Detail-ADK">
	    <i class="mdi mdi-eye"></i>
	</a>
@endif

@if (!empty($submited) && $submited == true && empty($recontest) )
	<span class="btn btn-icon waves-effect waves-light btn-orange">
	    Proses CLF
	</span>
	<a href="{{route('getDetailApproval', $approve['id'])}}" class="btn btn-icon waves-effect waves-light btn-info bottom-margin " data-original-title="View" title="Approval">
	    <i class="mdi mdi-eye"></i>
	</a>

@elseif( isset($recontest) && !empty($submited) && $submited == true )
	@if( isset($status) )
		@if( $status == 'Approval2' )
			<a onclick="addURL(this)" href="{{$recontest}}" class="btn btn-icon btn-orange waves-effect waves-light bottom-margin" data-original-title="Approval Rekontes Kredit" title="Approval Rekontes Kredit">
				<i class="fa fa-check-square-o" aria-hidden="true"></i>
			</a>
		@endif
	@endif

@else
	@if ( !empty($recontest) && !isset($submited) )
		<a onclick="addURL(this)" href="{{$recontest}}" class="btn btn-icon btn-orange waves-effect waves-light bottom-margin" data-original-title="Rekontes Kredit" title="Rekontes Kredit">
			<i class="fa fa-undo" aria-hidden="true"></i>
		</a>
	@endif

@endif

@if (isset($approve) && (!empty($visited)) && ($visited == true) && ($submited == false))

	@if(!empty($status))
		@if($status == 'Rejected')
			<a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-info bottom-margin " data-original-title="Approval" title="Approval" style="pointer-events: none;cursor: default;background-color: red !important;border-color: red !important;">
			    Kredit Ditolak
			</a>
			<a href="{{route('getDetailApproval', $approve['id'])}}" class="btn btn-icon waves-effect waves-light btn-info bottom-margin " data-original-title="View" title="View">
			    <i class="mdi mdi-eye"></i>
			</a>
		@endif
	@else
		@if(($response_status == 'approve') && ($is_screening == 1))
		<a href="{{route('getApproval', $approve['id'])}}" class="btn btn-icon waves-effect waves-light btn-info bottom-margin " data-original-title="Approval" title="Approval">
		    <i class="mdi mdi-check"></i>
		</a>
		@endif
	@endif
@endif

@if (isset($prescreening_result))
	@php ( $prescreening_class = ( $prescreening_result == 'Hijau' ? 'success' : ( $prescreening_result == 'Kuning' ? 'warning' : ( $prescreening_result == 'Merah' ? 'danger' : '' ) ) ) )
	<p class="btn-{{ $prescreening_class }} text-center" style="cursor: default;" onhover="javascript:void(0)">{{ $prescreening_result }}</p>
@endif

@if (isset($screening_result))
	<a href="javascript:void(0);" data-url="{{ $screening_result }}" data-verified="{{ $is_verified }}" data-screening="{{ $is_screening }}" class="btn btn-primary bottom-margin" data-original-title="Prescreening" title="Prescreening" id="btn-prescreening">
	    <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
	</a>
@endif

@if ((isset($dispose_collateral)) && ($status == "baru"))
	<a href="{!! $dispose_collateral !!}" class="btn btn-icon waves-effect waves-light btn-info bottom-margin" data-original-title="Penugasan" title="Penugasan">
	    <i class="fa fa-user-plus" aria-hidden="true"></i>
	</a>
@endif

@if ((isset($approval_collateral)) && ($status == "menunggu persetujuan"))
	<a href="{!! $approval_collateral !!}" class="btn btn-icon waves-effect waves-light btn-orange bottom-margin" data-original-title="Approval" title="Approval">
	    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
	</a>
@endif

@if ((isset($monitoring)) && ($status == "menunggu persetujuan"))
	<a href="{!! $monitoring !!}" class="btn btn-icon waves-effect waves-light btn-info bottom-margin" data-original-title="Monitoring Collateral" title="Monitoring Collateral">
	    <i class="fa fa-list-ul" aria-hidden="true"></i>
	</a>
@endif

@if ((isset($assignment_collateral)) && ($status == "Sedang Di Proses"))
	<a href="{!! $assignment_collateral !!}" class="btn btn-icon waves-effect waves-light btn-orange bottom-margin" data-original-title="Lakukan OTS / Penolakan
    Penugasan" title="Lakukan OTS / Penolakan
    Penugasan">
	    <i class="fa fa-briefcase" aria-hidden="true"></i>
	</a>
@endif

@if ((isset($upload_doc)) && ($status == "Menunggu Persetujuan"))
	<a href="{!! $upload_doc !!}" class="btn btn-icon waves-effect waves-light btn-info bottom-margin" data-original-title="Upload Dokumen" title="Upload Dokumen">
	    <i class="fa fa-upload" aria-hidden="true"></i>
	</a>
@endif

@if ((isset($detail_collateral)))
	<a href="{!! $detail_collateral !!}" class="btn btn-icon waves-effect waves-light btn-danger bottom-margin" data-original-title="Detail Informasi" title="Detail Informasi">
	    <i class="fa fa-info" aria-hidden="true"></i>
	</a>
@endif

@if ((isset($detail)))
	<a href="{!! $detail !!}" class="btn btn-icon waves-effect waves-light btn-danger bottom-margin" data-original-title="Detail Informasi" title="Detail Informasi">
	    <i class="fa fa-info" aria-hidden="true"></i>
	</a>
@endif

@if ( ( isset($prescreening) ) )
	<a href="{!! $prescreening !!}" class="btn btn-icon btn-{{ $prescreening_color }} waves-effect waves-light bottom-margin" data-original-title="Prescreening" title="Prescreening">
		<i class="fa fa-{{ $prescreening_icon }}" aria-hidden="true"></i>
	</a>
@endif

@if (isset($approval) && $approval == false)
	<a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-danger btn-delete bottom-margin" data-id="{{$eform_id}}" data-original-title="Hapus Pengajuan" title="Hapus Pengajuan">
	    <i class="mdi mdi-delete"></i>
	</a>
@endif

<script type="text/javascript">
var LongLat ='?hidden-long='+ $('input[name="hidden-long"]').val()+'&hidden-lat='+$('input[name="hidden-lat"]').val()+'&auditaction=klik icon rekontest';
function addURL(element)
{
    $(element).attr('href', function() {
        return this.href + LongLat;
    });
}
</script>