<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScoringRequest extends FormRequest
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
            'id' => 'required',
			'pefindo_score' => 'required|numeric',
        ];
    }

    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {

        return $this->all();
    }
}
