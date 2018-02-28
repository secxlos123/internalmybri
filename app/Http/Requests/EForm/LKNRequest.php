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
           'amount' => 'required',
           'npwp_number' => 'required',
           'purpose_of_visit' => 'required',
           'visit_result' => 'required',

           'source' => 'required|in:fixed,nonfixed',
           'income_salary' => 'required_if:source,fixed',
           'income' => 'required_if:source,nonfixed',
           'couple_salary' => 'required_if:source_income,Joint Income',

           'kpp_type' => 'required',
           'type_financed' => 'required',
           'economy_sector' => 'required',
           'project_list' => 'required',
           'program_list' => 'required',
           'use_reason' => 'required',

           // 'mutations' => 'required_if:source,nonfixed',

           // 'mutations.*.bank' => 'required_if:source,nonfixed',
           // 'mutations.*.number' => 'required_if:source,nonfixed',
           // 'mutations.*.file' => 'required_if:source,nonfixed|mimes:jpg,jpeg,png,gif,svg,rar,pdf,zip',
           // 'mutations.*.tables' => 'required_if:source,nonfixed',
           // 'mutations.*.tables.*.date' => 'required_if:source,nonfixed',
           // 'mutations.*.tables. amount'=> 'required_if:source,nonfixed',
           // 'mutations.*.tables.*.type' => 'required_if:source,nonfixed',
           // 'mutations.*.tables.*.note' => '',

           'seller_name' => 'required_if:use_reason,2,18',
           'seller_address' => 'required_if:use_reason,2,18',
           'seller_phone' => 'required_if:use_reason,2,18',
           'selling_price' => 'required_if:use_reason,2,18',

           'salary_slip' => 'required_unless:use_reason,13|mimes:jpg,jpeg,png,gif,svg,pdf',
           'legal_bussiness_document' => 'required_unless:use_reason,13|mimes:jpg,jpeg,png,gif,svg,pdf',
           'licence_of_practice' => 'required_unless:use_reason,13|mimes:jpg,jpeg,png,gif,svg,pdf',
           'family_card' => 'required_unless:use_reason,13|mimes:jpg,jpeg,png,gif,svg,pdf',
           'offering_letter' => 'required_unless:use_reason,13|mimes:jpg,jpeg,png,gif,svg,pdf',
           'photo_with_customer' => 'required_unless:use_reason,13|mimes:jpg,jpeg,png,gif,svg,pdf',

           'work_letter' => 'required_if:source,fixed|mimes:jpg,jpeg,png,gif,svg,pdf',
           'npwp' => 'required|mimes:jpg,jpeg,png,gif,svg,pdf',
           'marrital_certificate' => 'mimes:jpg,jpeg,png,gif,svg,pdf',
           'divorce_certificate' => 'mimes:jpg,jpeg,png,gif,svg,pdf',
           'down_payment' => 'mimes:jpg,jpeg,png,gif,svg,pdf',

           'building_tax' => 'required_unless:use_reason,13|mimes:jpg,jpeg,png,gif,svg,pdf',
           'photo_with_customer' => 'required_unless:use_reason,13|mimes:jpg,jpeg,png,gif,svg,pdf',

           'building_permit' => 'required_if:use_reason,2,18|mimes:jpg,jpeg,png,gif,svg,pdf',
           'proprietary' => 'required_if:use_reason,2,18|mimes:jpg,jpeg,png,gif,svg,pdf',

           'title' => 'required',
           'employment_status' => 'required',
           'age_of_mpp' => 'required',
           'loan_history_accounts' => 'required',
           'religion' => 'required',
           'office_phone' => 'required|string|regex:/^[0-9]+$/|min:9|max:12',

           'pros' => 'required',
           'cons' => 'required',
           'recommendation' => 'required',
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
            "amount.required" => "Jumlah yang diajukan harus diisi",
            "npwp_number.required" => "Nomor NPWP harus diisi",
            "visit_result.required" => "Hasil Kunjungan harus diisi",
            "purpose_of_visit.required" => "Tujuan Kunjungan harus diisi",
            "source.required" => "Sumber Penghasilan harus diisi",
            "income_salary.required" => "Gaji/THP harus diisi",
            "income.required" => "Penghasilan harus diisi",
            "couple_salary.required" => "Penghasilan Pasangan harus diisi",
            "kpp_type.required" => "KPP Harus diisi",
            "type_financed.required" => "Jenis dibiayai harus diisi",
            "economy_sector.required" => "Sektor ekonomi harus diisi",
            "project_list.required" => "Project harus diisi",
            "program_list.required" => "Program harus diisi",
            "use_reason.required" => "Tujuan Penggunaan harus diisi",
            "mutations.required_if" => "Harus harus diisi jika sumber penghasilan non fix income",
            "pros.required" => "Pros harus diisi",
            "cons.required" => "Cons harus diisi",
            "recommendation.required" => "Recommendation harus diisi",

            "npwp.required" => "File NPWP harus berupa gambar .jpg, .png, atau .gif",
            "salary_slip.required" => "Slip Gaji harus berupa gambar .jpg, .png, atau .gif",
            "legal_bussiness_document.required" => "Dokumen Legal Usaha harus berupa gambar .jpg, .png, atau .gif",
            "licence_of_practice.required" => "Izin Praktek harus berupa gambar .jpg, .png, atau .gif",
            "family_card.required" => "Kartu Kerluarga harus berupa gambar .jpg, .png, atau .gif",
            "marrital_certificate.required" => "Akta Nikah/Cerai harus berupa gambar .jpg, .png, atau .gif",
            "divorce_certificate.required" => "Akta Pisah Harta harus berupa gambar .jpg, .png, atau .gif",
            "photo_with_customer.required" => "Foto Debitur harus berupa gambar .jpg, .png, atau .gif",
            "offering_letter.required" => "Surat Penawaran harus berupa gambar .jpg, .png, atau .gif",
            "down_payment.required" => "Bukti DP harus berupa gambar .jpg, .png, atau .gif",
            "building_tax.required" => "PBB Terakhir harus berupa gambar .jpg, .png, atau .gif",
            "building_permit.required_if" => "IMB harus berupa gambar .jpg, .png, atau .gif",
            "proprietary.required_if" => "Surat Hak Milik harus diisi",

            "npwp.mimes" => "File NPWP harus berupa gambar .jpg, .png, atau .gif",
            "salary_slip.mimes" => "Slip Gaji harus berupa gambar .jpg, .png, atau .gif",
            "legal_bussiness_document. mimes"=> "Dokumen Legal Usaha harus berupa gambar .jpg, .png, atau .gif",
            "licence_of_practice.mimes" => "Izin Praktek harus berupa gambar .jpg, .png, atau .gif",
            "family_card.mimes" => "Kartu Kerluarga harus berupa gambar .jpg, .png, atau .gif",
            "marrital_certificate.mimes" => "Akta Nikah/Cerai harus berupa gambar .jpg, .png, atau .gif",
            "divorce_certificate.mimes" => "Akta Pisah Harta harus berupa gambar .jpg, .png, atau .gif",
            "photo_with_customer.mimes" => "Foto Debitur harus berupa gambar .jpg, .png, atau .gif",
            "offering_letter.mimes" => "Surat Penawaran harus berupa gambar .jpg, .png, atau .gif",
            "down_payment.mimes" => "Bukti DP harus berupa gambar .jpg, .png, atau .gif",
            "building_tax.mimes" => "PBB Terakhir harus berupa gambar .jpg, .png, atau .gif",
            "proprietary.mimes" => "Surat Hak Milik harus berupa file",
            "building_permit.mimes" => "Izin Mendirikan Bangunan harus berupa gambar .jpg, .png, atau .gif",

            "npwp.required_unless" => "File NPWP harus berupa gambar .jpg, .png, atau .gif",
            "salary_slip.required_unless" => "Slip Gaji harus berupa gambar .jpg, .png, atau .gif",
            "legal_bussiness_document.required_unless" => "Dokumen Legal Usaha harus berupa gambar .jpg, .png, atau .gif",
            "licence_of_practice.required_unless" => "Izin Praktek harus berupa gambar .jpg, .png, atau .gif",
            "work_letter.required_unless" => "Surat Keterangan Kerja harus berupa gambar .jpg, .png, atau .gif",
            "family_card.required_unless" => "Kartu Kerluarga harus berupa gambar .jpg, .png, atau .gif",
            "offering_letter.required_unless" => "Surat Penawaran harus berupa gambar .jpg, .png, atau .gif",
            "photo_with_customer.required_unless" => "Foto Debitur harus berupa gambar .jpg, .png, atau .gif",

        ];
    }
}
