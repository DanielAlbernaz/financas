<?php

namespace App\Http\Requests\entry;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EntryCreateRequest extends FormRequest
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
            'value' => 'required|numeric|regex:/^-?[0-9]+(?:.[0-9]{1,2})?$/',
            'type_id' => 'required|integer',
            'category_id' => 'required|integer',
            'description' => 'required|string|max:255',
            'note' => 'max:1000'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
    public function messages() 
    {
        return [
            'title.required' => 'O campo title é obrigatório',
            'title.max' => 'O máximo de caracteres permitido são 80.'
        ];
    }
}
