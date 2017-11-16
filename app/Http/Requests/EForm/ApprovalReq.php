<?php

namespace App\Http\Requests\EForm;

use Illuminate\Foundation\Http\FormRequest;

class ApprovalReq extends FormRequest
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
           'recommend'                  => 'required',
           'recommendation'             => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "recommend.required"         => "Rekomendasi harus dipilih",
            "recommendation.required"         => "Rincian Rekomendasi harus diisi",
        ];
    }
}
