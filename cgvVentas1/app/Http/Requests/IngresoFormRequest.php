<?php

namespace cgvVentas\Http\Requests;

use cgvVentas\Http\Requests\Request;

class IngresoFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
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
            'idproveedor'=>'required',
            'tipo_comprobante'=>'required|max:20',
            'num_comprobante'=>'required|max:10',
            'idarticulo'=>'required',
            'cantidad'=>'required',
            'num_serie'=>'required',
            'precio_compra'=>'required',
            'precio_venta'=>'required'
        ];
    }
}
