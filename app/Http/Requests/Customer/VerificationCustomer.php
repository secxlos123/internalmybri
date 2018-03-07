<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class VerificationCustomer extends FormRequest
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
            // 'nik' => 'required|numeric|digits_between:10,16',
            'full_name' => 'required',
            'birth_place_id'   => 'required',
            'birth_date'    => 'date|date_format:Y-m-d|before:today',
            'address'   => 'required|max:255',
            'gender'    => 'required',
            'city_id'  => 'required',
            'phone' => 'required|numeric|digits_between:1,12',
            'citizenship_id'   => 'required',
            'status'    => 'required',
            'current_address' => 'required',
            'address_status'    => 'required',
            'mother_name'   => 'required',
            'mobile_phone'  => 'required|numeric|digits_between:1,12',
            'emergency_contact' => 'required|numeric|digits_between:1,12',
            'emergency_relation'    => 'required',
            'identity'  => 'mimes:jpeg,jpg,png,gif,pdf|max:10000',
            // 'npwp'  => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            // 'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'job_field_id'=>'required',
            'job_type_id'=>'required',
            'job_id'=>'required',
            'position'=>'required',
            'work_duration'=>'required',
            'work_duration_month' => 'required',
            'company_name'=>'required',
            'office_address'=>'required',
            'salary'    => 'required',
            // 'other_salary'  => 'required',
            'loan_installment'  => 'required',
            'emergency_name'=>'required',
            'emergency_mobile_phone'=>'required',
            'emergency_relation'=>'required',
            'dependent_amount'  => 'required|numeric',
            // 'salary_slip'  => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            // 'bank_statement'  => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            // 'family_card'  => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            // 'marrital_certificate'  => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            // 'diforce_certificate'  => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'couple_nik' => 'required_if:status,2',
            'couple_name' => 'required_if:status,2',
            'couple_birth_date' => 'required_if:status,2',
            'couple_birth_place_id' => 'required_if:status,2',
            // 'developer'         => 'required',
            // 'property'          => 'required',
            // 'property_type'     => 'required_if:developer,1',
            // 'property_item'     => 'required_if:developer,1',
            'price'             => 'required',
            'building_area'     => 'required',
            'home_location'     => 'required',
            'year'              => 'required',
            'active_kpr'        => 'required',
            'dp'                => 'required',
            // 'category'          => 'required',
            // 'product_type'      => 'required',
            'status_property'   => 'required',
            'developer' => 'required_if:status_property,1',
            // 'appointment_date'  => 'required',
            'request_amount'    => 'required',
            // 'kpr_type'          => 'required',
            // 'kpr_type_property' => 'required',
            'couple_identity'  => 'required_if:status,2',
            'zip_code'=> 'required|numeric|digits:5',
            'zip_code_current' => 'required|numeric|digits:5',
            'zip_code_office' => 'required|numeric|digits:5',
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
            'address.required' => 'Kolom alamat harus diisi.',
            'gender.required' => 'Kolom jenis kelamin harus diisi.',
            'city.required' => 'Kolom kota harus diisi.',
            'phone.required' => 'Kolom telephone harus diisi.',
            'citizenship.required' => 'Kolom kewarganegaraan harus diisi.',
            'status.required' => 'Kolom status pernikahan harus diisi.',
            'address_status.required' => 'Kolom status tempat tinggal harus diisi.',
            'mother_name.required' => 'Kolom nama ibu harus diisi.',
            'mobile_phone.required' => 'Kolom nomor handphone harus diisi.',
            'emergency_name.required' => 'Kolom emergency contact harus diisi.',
            'emergency_relation.required' => 'Kolom relasi harus diisi.',
            // 'identity.required' => 'Kolom foto ktp harus diisi.',
            // 'npwp.required' => 'Kolom foto npwp harus diisi.',
            // 'image.required' => 'Kolom foto harus diisi.',
            'work_type.required' => 'Kolom jenis pekerjaan harus diisi.',
            'work.required' => 'Kolom pekerjaan harus diisi.',
            'company_name.required' => 'Kolom perusahaan harus diisi.',
            'work_field.required' => 'Kolom bidang pekerjaan harus diisi.',
            // 'position.required' => 'Kolom jabatan harus diisi.',
            'work_duration.required' => 'Kolom durasi kerja harus diisi.',
            'office_address.required' => 'Kolom alamat perusahaan harus diisi.',
            'salary.required' => 'Kolom pendapatan harus diisi.',
            // 'other_salary.required' => 'Kolom pendapatan lain harus diisi.',
            // 'loan_installment.required' => 'Kolom angsuran pinjaman harus diisi.',
            // 'loan_installment.numeric' => 'Kolom angsuran pinjaman harus berisikan angka.',
            // 'dependent_amount.required' => 'Kolom jumlah tanggungan harus diisi.',
            // 'dependent_amount.numeric' => 'Kolom jumlah tanggungan harus berisikan angka.',
            // 'legal_document.required'  => 'Kolom Dokumen Legal Agunan harus diisi',
            // 'bank_statement.required'  => 'Kolom Bank Statement harus diisi',
            // 'family_card.required'  => 'Kolom Kartu Keluarga harus diisi',
            // 'marrital_certificate.required'  => 'Kolom Akta Nikah/Akta Cerai harus diisi',
            // 'diforce_certificate.required'  => 'Kolom Akta Pisah Harta harus diisi'
            'zip_code.required' => 'Kolom Kode Pos KTP harus diisi.',
            'zip_code_current.required' => 'Kolom Kode Pos Domisili harus diisi.',
            'zip_code_office.required' => 'Kolom Kode Pos Kantor harus diisi.',
            'zip_code.digits' => 'Kolom Kode Pos KTP harus berisi 5 angka.',
            'zip_code_current.digits' => 'Kolom Kode Pos Domisili harus berisi 5 angka.',
            'zip_code_office.digits' => 'Kolom Kode Pos Kantor harus berisi 5 angka.'
        ];
    }
}
