<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "nip"                   => "required|numeric",
            "email"                 => "required|email",
            "full_name"             => "required",
            "gender"                => "required",
            "phone"                 => "required",
            "mobile_phone"          => "required",
            "images"                => "required|mimes:jpeg,jpg,png",
            "position"              => "required",
            "office_id"             => "required",
            "role_id"               => "required"
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
            "nip.required"               => "Nomor Induk Pegawai harus diisi",
            "nip.numeric"                => "Nomor Induk Pegawai harus diisi dengan angka",
            "email.required"             => "Email harus diisi",
            "full_name.required"         => "Nama Lengkap harus diisi",
            "mobile_phone.required"      => "Nomor Handphone harus diisi",
            "gender.required"            => "Jenis Kelamin harus diisi",
            "phone.required"             => "Nomor Telepon harus diisi",
            "images.required"            => "Foto harus diisi",
            "position.required"          => "Jabatan harus diisi",
            "office_id.required"         => "Kantor cabang harus diisi",
            "role_id.required"           => "Role harus diisi",
        ];
    }
}
