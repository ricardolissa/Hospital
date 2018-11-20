<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RegPacientesFormRequest extends FormRequest
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
            'dni' => 'min:1|required|numeric|unique:personas,dni',
            'email' => 'required|unique:personas,email',
            'fecha_nacimiento' => 'string|min:1|nullable',
            'edad' => 'min:1|nullable|numeric',
            'obrasocial_id' => 'nullable',
            'antecedentes_familiares' => 'string|min:1|nullable',
            'antecedentes_patologico' => 'string|min:1|nullable',
            'antecedentes_nopatologico' => 'string|min:1|nullable',
            'padecimiento_actual' => 'string|min:1|nullable',
    
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
        $data = $this->only(['nombre','apellido','dni','email','fecha_nacimiento','edad', 'obrasocial_id',
                'antecedentes_familiares','antecedentes_patologico','antecedentes_nopatologico','padecimiento_actual']);

        return $data;
    }

}