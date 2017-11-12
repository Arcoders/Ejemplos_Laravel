<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->role_id === 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method())
        {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'name' => 'required|unique:ingredients|max:255',
                    'price' => 'required'
                ];
            case 'PUT':
            case 'PATCH':
                [
                    'name' => 'required|max:255|unique:ingredients,name'.$this->segment(3),
                    'price' => 'required'
                ];
            default:break;
        }
    }


    public function messages()
    {
        return [
            'name.required' => 'El nombre de la pizza es requerido',
            'name.unique' => 'Esa pizza ya existe!',
            'price.required' => 'El precio de la pizza es requerido',
        ];
    }


}
