<?php

namespace App\Http\Requests\ThirdParty;

use Illuminate\Foundation\Http\FormRequest;

class ThirdPartyRequest extends FormRequest
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
            "name"              => "required",
            "city_id"           => "required",
            "address"           => "required",
            "mobile_phone"      => "required|digits_between:1,12",
            "email"             => "required|email"
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
            "name.required"                  => "Nama Pihak Ke-3 harus diisi",
            "email.required"                 => "Email harus diisi",
            "city_id.required"               => "Nama Kota harus diisi",
            "address.required"               => "Alamat harus diisi",
            "mobile_phone.required"          => "Nomor Handphone harus diisi",
            "mobile_phone.digits_between"    => "Nomor Handphone harus diisi 12 karakter",
            "email.required"                 => "Email harus diisi"
        ];
    }
}
