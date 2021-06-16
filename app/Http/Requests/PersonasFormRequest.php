<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PersonasFormRequest extends FormRequest
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
        $rules = [
            'nombre' => 'string|min:1|nullable',
            'apellido' => 'string|min:1|nullable',
            'dni' => 'string|min:1|nullable',
            'email' => 'nullable',
            'fecha_nacimiento' => 'string|min:1|nullable',
            'edad' => 'string|min:1|nullable',
            'telefono1' => 'string|min:1|nullable',
            'telefono2' => 'string|min:1|nullable',
    
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['nombre','apellido','dni','email','fecha_nacimiento','edad','telefono1', 'telefono2']);

        return $data;
    }

}