<?php

namespace App\Http\Requests\Developer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDevRequest extends FormRequest
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
            "developer_name"    => "required",
            "city_id"           => "required",
            "address"           => "required",
            "mobile_phone"      => "required|digits_between:12,12",
            "company_name"      => "required",
            "email"             => "required|email",
            "phone"             => "required|digits_between:12,12",
            "summary"           => "required",
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
            "developer_name.required"        => "Nama Developer harus diisi",
            "email.required"                 => "Email harus diisi",
            "city_id.required"               => "Nama Kota harus diisi",
            "address.required"               => "Alamat harus diisi",
            "mobile_phone.required"          => "Nomor Handphone harus diisi",
            "mobile_phone.digits_between"    => "Nomor Handphone harus diisi 12 karakter",
            "company_name.required"          => "Nama Perusahaan harus diisi",
            "email.required"                 => "Email harus diisi",
            "phone.required"                 => "Nomor Telepon harus diisi",
            "phone.digits_between"           => "Nomor Telepon harus diisi 12 karakter",
            "summary"                        => "required",
        ];
    }
}
