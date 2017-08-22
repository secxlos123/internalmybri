<?php

namespace App\Http\Requests\EForm;

use Illuminate\Foundation\Http\FormRequest;

class LKNRequest extends FormRequest
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
           'visitor_name' => 'required',
           'place' => 'required',
           'date' => 'required|date|after_or_equal:today',
           'name' => 'required',
           'job' => 'required',
           'phone' => 'required',
           'account' => 'required',
           'amount' => 'required',
           'type' => 'required',
           'purpose_of_visit' => 'required',
           'result' => 'required',
           'source' => 'required|in:fixed,not_fixed',
           'income' => 'required_if:source,fixed',
           'income_salary' => 'required_if:source,fixed',
           'income_allowance' => 'required_if:source,fixed',
           'income_mutation_type' => 'required_if:source,fixed',
           'income_mutation_number' => 'required_if:source,fixed',
           'income_salary_image' => 'required_if:source,fixed|image',
           'business_income' => 'required_if:source,not_fixed',
           'business_mutation_type' => 'required_if:source,not_fixed',
           'bussiness_mutation_number' => 'required_if:source,not_fixed',
           'bussiness_other' => 'required_if:source,not_fixed',
           'mutation_file' => 'required|file',
           'photo_with_customer' => 'required|image',
           'pros' => 'required',
           'cons' => 'required',
           'seller_name' => 'required',
           'seller_address' => 'required',
           'seller_phone' => 'required',
           'selling_price' => 'required|numeric',
           'reason_for_sale' => 'required',
           'relation_with_seller' => 'required'
        ];
    }
}
