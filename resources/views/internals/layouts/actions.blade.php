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

@if (isset($dispotition))
	<a href="{{route('getDispotition', $dispotition['id'])}}" class="btn btn-icon waves-effect waves-light btn-teal @if($dispotition['ao_name'] == '-')@else disabled @endif" data-toggle="tooltip" data-placement="top" title="" data-original-title="Disposisi">
		<i class="mdi mdi-loupe"></i>
	</a>
@endif

@if (isset($screening))
	<a href="#" class="btn btn-icon waves-effect waves-light btn-info " data-toggle="tooltip" data-placement="top" title="" data-original-title="Screening">
	    <i class="mdi mdi-eye"></i>
	</a>
@endif


@if ((isset($verification) && ($verified == false)))
<a href="{!! $verification !!}" class="btn btn-icon waves-effect waves-light btn-info">
    Verifikasi
</a>
@endif

@if ($verified == true)
<span class="btn btn-icon waves-effect waves-light btn-success">
    Verified
</span>
@endif

@if ((isset($lkn))  && ($verified == true))
<a href="{!! $lkn !!}" class="btn btn-icon waves-effect waves-light btn-info">
    LKN
</a>
@endif

@if (isset($approve))
<a href="{{route('getApproval', $approve['id'])}}" class="btn btn-icon waves-effect waves-light btn-info @if($approve['is_approved'] == false)@else disabled @endif" data-original-title="Approval" title="Approval">
    <i class="mdi mdi-check"></i>
</a>
@endif