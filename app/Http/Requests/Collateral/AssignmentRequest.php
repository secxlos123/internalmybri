<?php

namespace App\Http\Requests\Collateral;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
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
            'staff_id'  => 'required',
            'remark'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'staff_id.required' => 'Kolom Nama Staff harus diisi.',
            'remark.required' => 'Catatan Penugasan harus diisi.',
        ];
    }
}
