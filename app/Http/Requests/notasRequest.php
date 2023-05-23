<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class notasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'csv' => 'required|file'
        ];
    }

    public function messages()
    {
        return  [
            'csv.required' => 'Este campo título é obrigatório',
            'required'       => 'Este campo é obrigatório',
        ];
    }
}
