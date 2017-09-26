<?php

namespace App\Http\Requests\Developer;

use Illuminate\Foundation\Http\FormRequest;

class DevRequest extends FormRequest
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
            "mobile_phone"      => "required|digits_between:1,12",
            "image"             => "required|mimes:jpeg,jpg,png,gif|max:1024",
            "summary"           => "required",
            "company_name"      => "required",
            "email"             => "required|email",
            "phone"             => "required|digits_between:1,12",
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
            "image.required"                 => "Logo Harus diisi",
            "image.mimes:jpeg,jpg,png"       => "Logo harus berupa gambar .jpg, .png, atau .gif",
            "image.max"                      => "Logo harus kurang dari 1 MB",
            "summary.required"               => "Ringkasan harus diisi",
            "company_name.required"          => "Nama Perusahaan harus diisi",
            "email.required"                 => "Email harus diisi",
            "phone.required"                 => "Nomor Telepon harus diisi",
            "phone.digits_between"           => "Nomor Telepon harus diisi 12 karakter",
        ];
    }
}
