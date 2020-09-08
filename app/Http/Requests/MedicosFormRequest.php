<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MedicosFormRequest extends FormRequest
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
            'persona_id' => 'nullable',
            'foto' => 'string|min:1|nullable',
            'legajo' => 'string|min:1|nullable',
            'matricula' => 'string|min:1|nullable',
    
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
        $data = $this->only(['persona_id','foto','legajo','matricula','especialidades']);

        return $data;
    }

}