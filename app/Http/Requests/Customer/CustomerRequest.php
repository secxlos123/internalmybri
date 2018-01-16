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
            'nik' => 'required|numeric|digits:16',
            'full_name' => 'required',
            'birth_place_id'   => 'required',
            // 'birth_date'    => 'date|date_format:Y-m-d',
            'gender'    => 'required',
            // 'city'  => 'required',
            // 'phone' => 'required|numeric|digits_between:1,12',
            'address'   => 'required',
            'status'    => 'required|in:1,2,3',
            'email'    => 'email|required',
            'mother_name'   => 'required',
            'mobile_phone'  => 'required|string|regex:/^08[0-9]+$/|min:9|max:12',
            'identity'  => 'required|mimes:jpg,jpeg,png,gif,svg,pdf|max:10000',
            'couple_nik' => 'required_if:status,2',
            'couple_name' => 'required_if:status,2',
            'couple_birth_date' => 'required_if:status,2',
            'couple_birth_place_id' => 'required_if:status,2',
            'couple_identity'  => 'required_if:status,2|mimes:jpeg,jpg,png,gif,pdf|max:10000'
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'Kolom NIK harus diisi.',
            'nik.numeric' => 'Kolom NIK harus berisikan angka.',
            'nik.max' => 'Kolom NIK maksimal 16 digit.',
            'full_name.required' => 'Kolom nama depan harus diisi.',
            'birth_place_id.required' => 'Kolom tempat lahir harus diisi.',
            'birth_date.required' => 'Kolom tanggal lahir harus diisi.',
            'gender.required' => 'Kolom jenis kelamin harus diisi.',
            'email.required'    => 'email harus diisi',
            // 'city.required' => 'Kolom kota harus diisi.',
            // 'phone.required' => 'Kolom telephone harus diisi.',
            'status.required' => 'Kolom status pernikahan harus diisi.',
            'address.required' => 'Kolom alamat harus diisi.',
            'mother_name.required' => 'Kolom nama ibu harus diisi.',
            'mobile_phone.required' => 'Kolom nomor handphone harus diisi.',
            'identity.required' => 'Kolom foto ktp harus diisi.',
            'couple_nik.required' => 'NIK Pasangan harus diisi.',
            'couple_name.required' => 'Nama Pasangan harus diisi.',
            'couple_identity.required' => 'Kolom foto ktp pasangan harus diisi.',
            'couple_birth_date' => 'Kolom Tanggal Lahir Pasangan harus diisi',
            'couple_birth_place_id' => 'Kolom Tempat Lahir Pasangan harus diisi'
        ];
    }
}
