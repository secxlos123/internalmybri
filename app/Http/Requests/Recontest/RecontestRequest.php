<?php

namespace App\Http\Requests\Recontest;

use Illuminate\Foundation\Http\FormRequest;

class RecontestRequest extends FormRequest
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
            'recommendation'             => 'required',
            'source'                     => 'required|in:fixed,nonfixed',
            'income_salary'              => 'required_if:source,fixed',
            'income'                     => 'required_if:source,nonfixed',
            'couple_salary'              => 'required_if:source_income,Joint Income',
            'pros'                       => 'required',
            'cons'                       => 'required',
        ];
    }
}
