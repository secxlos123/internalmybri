<?php

namespace App\Http\Requests\EForm;

use Illuminate\Foundation\Http\FormRequest;

class EFormRequest extends FormRequest
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
            'developer'         => 'required',
            'property'          => 'required',
            // 'property_type'     => 'required_if:developer,1',
            // 'property_item'     => 'required_if:developer,1',
            'price'             => 'required',
            'building_area'     => 'required',
            'home_location'     => 'required',
            'year'              => 'required',
            'active_kpr'        => 'required',
            'dp'                => 'required',
            // 'category'          => 'required',
            'product_type'      => 'required',
            // 'status_property'   => 'required',
            'appointment_date'  => 'required',
            'request_amount'    => 'required',
            'kpr_type'          => 'required',
            'kpr_type_property' => 'required',
            'nik'               => 'required',
            'latitude'          => 'required',
            'longitude'         => 'required',
            'address_location'  => 'required',
            // 'branch_id'         => 'required',
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
            "developer.required"       => "Nama Developer harus dipilih",
            "property.required"        => "Nama Properti harus diisi",
            "price.required"           => "Harga harus dipilih",
            "building_area.required"   => "Luas Bangunan harus diisi",
            "home_location.required"   => "Lokasi Rumah harus dipilih",
            "year.required"            => "Jangka Waktu harus diisi",
            "active_kpr.required"      => "KPR Aktif harus dipilih",
            "dp.required"              => "Uang Muka harus diisi",
            "kpr_type.required"        => "Jenis KPR harus diisi",
            "kpr_type_property.required"=> "Jenis Properti harus diisi",
            // "category.required"        => "Kategori harus dipilih",
            "product_type.required"    => "Jenis Produk harus diisi",
            // "status_property.required" => "Nama Developer harus dipilih",
            "appointment_date.required"=> "Tanggal Pengajuan harus diisi",
            "request_amount.required"  => "Jumlah Permohonan harus dipilih",
            "latitude.required"        => "Latitude harus diisi",
            "longitude.required"       => "Longitude harus dipilih",
            "address.required"         => "Alamat harus diisi",
            // "branch_id.required"       => "Kantor Cabang harus dipilih",
            "nik.required"             => "NIK harus diisi"
        ];
    }
}
