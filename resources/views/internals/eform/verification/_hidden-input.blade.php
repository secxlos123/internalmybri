<div class="row">
	<input type="hidden" name="full_name" @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['name']}}" @endif id="name">
	<input type="hidden" name="address" @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['address']}}" @endif id="address">
	<input type="hidden" name="mother_name" @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['mother_name']}}" @endif id="mother_name">
	<input type="hidden" name="phone" @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['phone']}}" @else value="0" @endif id="phone">
	<input type="hidden" name="mobile_phone" @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['mobile_phone']}}" @else value="0" @endif id="mobile_phone">
</div>

<div class="hidden">
	<div id="nameBASE">{{ !empty($dataCustomer) ? $dataCustomer['customer']['name'] : '' }}</div>
	<div id="addressBASE">{{ !empty($dataCustomer) ? $dataCustomer['customer']['address'] : '' }}</div>
	<div id="mother_nameBASE">{{ !empty($dataCustomer) ? $dataCustomer['customer']['mother_name'] : '' }}</div>
	<div id="phoneBASE">{{ !empty($dataCustomer) ? $dataCustomer['customer']['phone'] : 0 }}</div>
	<div id="mobile_phoneBASE">{{ !empty($dataCustomer) ? $dataCustomer['customer']['mobile_phone'] : 0 }}</div>
</div>