<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ConsultasFormRequest extends FormRequest
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
            'diagnostico' => 'string|min:1|nullable',
            'receta' => 'string|min:1|nullable',
            'fecha' => 'string|min:1|nullable',
            'arribo' => 'string|min:1|nullable',
            'egreso' => 'string|min:1|nullable',
            'tiempo_consulta' => 'string|min:1|nullable',
            'paciente_id' => 'nullable',
            'medico_id' => 'nullable',
            'guardia_id' => 'nullable',
            'prioridad_id' => 'nullable',
    
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
        $data = $this->only(['diagnostico','receta','fecha','arribo','egreso','tiempo_consulta','paciente_id','medico_id','guardia_id','prioridad_id']);

        return $data;
    }

}