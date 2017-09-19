<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'nik' => 'required|numeric|digits_between:10,16',
            'full_name' => 'required',
            'birth_place'   => 'required',
            'birth_date'    => 'date|date_format:Y-m-d|before:today',
            'gender'    => 'required',
            // 'city'  => 'required',
            // 'phone' => 'required|numeric|digits_between:1,12',
            // 'citizenship'   => 'required',
            'status'    => 'required',
            'mother_name'   => 'required',
            'mobile_phone'  => 'required|numeric|digits_between:1,12',
            'identity'  => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'couple_nik' => 'required_if:status,1,required',
            'couple_name' => 'required_if:status,1,required',
            'couple_birth_date' => 'required_if:status,1,required',
            'couple_birth_place' => 'required_if:status,1,required',
            'couple_identity'  => 'required_if:status,1|mimes:jpeg,jpg,png,gif|required|max:10000'
        ];
    }
    public function messages()
    {
        return [
            'nik.required' => 'Kolom NIK harus diisi.',
            'nik.numeric' => 'Kolom NIK harus berisikan angka.',
            'nik.max' => 'Kolom NIK maksimal 16 digit.',
            'full_name.required' => 'Kolom nama depan harus diisi.',
            'birth_place.required' => 'Kolom tempat lahir harus diisi.',
            'birth_date.required' => 'Kolom tanggal lahir harus diisi.',
            'gender.required' => 'Kolom jenis kelamin harus diisi.',
            // 'city.required' => 'Kolom kota harus diisi.',
            // 'phone.required' => 'Kolom telephone harus diisi.',
            'status.required' => 'Kolom status pernikahan harus diisi.',
            // 'address_status.required' => 'Kolom status tempat tinggal harus diisi.',
            'mother_name.required' => 'Kolom nama ibu harus diisi.',
            'mobile_phone.required' => 'Kolom nomor handphone harus diisi.',
            'identity.required' => 'Kolom foto ktp harus diisi.',
            'couple_nik.required' => 'NIK Pasangan harus diisi.',
            'couple_name.required' => 'Nama Pasangan harus diisi.',
            'couple_identity.required' => 'Kolom foto ktp pasangan harus diisi.',
            'couple_birth_date' => 'Kolom Tanggal Lahir Pasangan harus diisi',
            'couple_birth_place' => 'Kolom Tempat Lahir Pasangan harus diisi'
        ];
    }
}
