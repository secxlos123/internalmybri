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
	<a href="{!! $dispotition !!}" class="btn btn-icon waves-effect waves-light btn-teal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Disposisi">
		<i class="mdi mdi-loupe"></i>
	</a>
@endif

@if (isset($screening))
	<a href="#" class="btn btn-icon waves-effect waves-light btn-info " data-toggle="tooltip" data-placement="top" title="" data-original-title="Screening">
	    <i class="mdi mdi-eye"></i>
	</a>
@endif


@if (isset($verification))
<a href="{!! $verification !!}" class="btn btn-icon waves-effect waves-light btn-info">
    Verifikasi
</a>
@endif

@if (isset($lkn))
<a href="{!! $lkn !!}" class="btn btn-icon waves-effect waves-light btn-info">
    LKN
</a>
@endif