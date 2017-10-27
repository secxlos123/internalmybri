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
           'npwp_number'                => 'required',
           'purpose_of_visit'           => 'required',
           'visit_result'               => 'required',

           'source'                     => 'required|in:fixed,unfixed',

           'kpp_type'                   => 'required',
           'type_financed'              => 'required',
           'economy_sector'             => 'required',
           'project_list'               => 'required',
           'program_list'               => 'required',
           'use_reason'                 => 'required',

           'mutations'                  => 'required',

           'seller_name'                => 'required',
           'seller_address'             => 'required',
           'seller_phone'               => 'required',
           'selling_price'              => 'required|numeric',
           'reason_for_sale'            => 'required',
           'relation_with_seller'       => 'required',

           'income_salary_image'        => 'required_if:source,fixed|image',
           'business_income'            => 'required_if:source,unfixed',
           'business_mutation_type'     => 'required_if:source,unfixed',
           'bussiness_mutation_number'  => 'required_if:source,unfixed',
           'bussiness_other'            => 'required_if:source,unfixed',
           'mutation_file'              => 'required|file',
           'npwp'                       => 'required|file',

           'photo_with_customer'        => 'required|image',
           'pros'                       => 'required',
           'cons'                       => 'required',
        ];
    }
}
