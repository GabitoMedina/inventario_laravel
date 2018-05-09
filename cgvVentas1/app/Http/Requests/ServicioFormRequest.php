<?php

namespace cgvVentas\Http\Requests;

use cgvVentas\Http\Requests\Request;

class ServicioFormRequest extends Request
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
            'idcliente'=>'required',
            // 'tipo_comprobante'=>'required|max:20',
            'num_comprobante'=>'required|max:10',
            'fecha_entrada'=>'required',
            // 'fecha_entrada'=>'required',
            'costo_chequeo'=>'required',
            'bono'=>'required',
            'saldo'=>'required',
            'total_servicio'=>'required'
        ];
    }
}
