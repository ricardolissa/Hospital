<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ObrasocialsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'numero_socio' => 'string|min:1|nullable',
            'plan' => 'string|min:1|nullable',
            'nombre' => 'string|min:1|nullable',
    
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
        $data = $this->only(['numero_socio','plan','nombre']);

        return $data;
    }

}