<?php

namespace App\Http\Requests\Calculator;

use Illuminate\Foundation\Http\FormRequest;

class CalculatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price' => 'required',
            'dp' => 'required',
            'down_payment'   => 'required',
            'interest_rate_type'    => 'required',
            'price_platform'    => 'required',
            'time_period'    => 'required_if:interest_rate_type,1,2',
            'time_period_total'   => 'required_if:interest_rate_type,3,4',
            'time_period_fixed'  => 'required_if:interest_rate_type,3,4',
            'time_period_floor'  => 'required_if:interest_rate_type,4',
            'rate' => 'required_if:interest_rate_type,1,2',
            'interest_rate_float' => 'required_if:interest_rate_type,3,4',
            'interest_rate_fixed' => 'required_if:interest_rate_type,3,4',
            'interest_rate_floor' => 'required_if:interest_rate_type,4'
        ];
    }
}
