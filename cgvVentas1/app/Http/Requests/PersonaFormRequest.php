<?php

namespace cgvVentas\Http\Requests;

use cgvVentas\Http\Requests\Request;

class PersonaFormRequest extends Request
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
            'nombre'=>'required|max:100',
            'tipo_documento'=>'required|max:15',
            'num_documento'=>'required|numeric',
            'direccion'=>'max:70',
            'telefono'=>'numeric',
            'email'=>'max:50'
        ];
    }
}
