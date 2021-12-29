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
            'date' => 'required|date',
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
            'value.required' => 'O campo value é obrigatório',
            'date.required' => 'O campo date é obrigatório',
            'value.regex' => 'Formato invalido',
            'value.numeric' => 'O compo é do tipo numeric.',
            'description.required' => 'O compo description é obrigatório.',
            'description.max' => 'O maximo de caracteres aceitos são 255.',
            'note.max' => 'O maximo de caracteres aceitos são 1000.',
        ];
    }
}
