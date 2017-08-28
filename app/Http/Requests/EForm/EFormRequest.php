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
           'name' => 'required',
           'date' => 'required|date|after_or_equal:today',
           'location' => 'required',
           'cities' => 'required',
           'office_name' => 'required',

           'request_amount' => 'required_if:product_type,kpr',
           'year' => 'required_if:product_type,kpr',
           'home_location' => 'required_if:product_type,kpr',
           'active_kpr' => 'required_if:product_type,kpr',
           'price' => 'required_if:product_type,kpr',
           'down_payment' => 'required_if:product_type,kpr',
           'building_area' => 'required_if:product_type,kpr',
           'image' => 'required_if:product_type,kpr|image',

        ];
    }
}
