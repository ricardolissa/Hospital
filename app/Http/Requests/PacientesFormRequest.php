<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PacientesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//actualizar
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'persona_id' => 'nullable',
            'obrasocial_id' => 'nullable',
            'antecedentes_familiares' => 'string|min:1|nullable',
            'antecedentes_patologico' => 'string|min:1|nullable',
            'antecedentes_nopatologico' => 'string|min:1|nullable',
    
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
        $data = $this->only(['persona_id','obrasocial_id','antecedentes_familiares','antecedentes_patologico','antecedentes_nopatologico']);

        return $data;
    }

}