<?php

namespace App\Http\Requests\EForm;

use Illuminate\Foundation\Http\FormRequest;

class EFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           // 'name' => 'required',
           // 'date' => 'required|date|after_or_equal:today',
           // 'location' => 'required',
           // 'cities' => 'required',
           // 'office_name' => 'required',

           // 'request_amount' => 'required_if:product_type,kpr',
           // 'year' => 'required_if:product_type,kpr',
           // 'home_location' => 'required_if:product_type,kpr',
           // 'active_kpr' => 'required_if:product_type,kpr',
           // 'price' => 'required_if:product_type,kpr',
           // 'down_payment' => 'required_if:product_type,kpr',
           // 'building_area' => 'required_if:product_type,kpr',
           // 'image' => 'required_if:product_type,kpr|image',

           'product_type' => 'required|in:kpr',
           'status_property' => 'required_if:product_type,kpr,required|in:new,second',
           'developer' => 'required_if:product_type,kpr,required_if:status_property,new',
           'property' => 'required_if:product_type,kpr,required_if:status_property,new',
           'price' => 'required_if:product_type,kpr,required',
           'building_area' => 'required_if:product_type,kpr,required|numeric',
           'home_location' => 'required_if:product_type,kpr,required',
           'year' => 'required_if:product_type,kpr,required|numeric',
           'active_kpr' => 'required_if:product_type,kpr,required|numeric',
           'dp' => 'required_if:product_type,kpr,required|numeric',
           'request_amount' => 'required_if:product_type,kpr,required',
           'nik' => 'required|exists:customer_details,nik',
           'office_id' => 'required|exists:offices,id',
           'appointment_date' => 'required|date',
           'address' => 'required',
           'longitude' => 'required',
           'latitude' => 'required'

        ];
    }
}
