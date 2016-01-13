<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ParteFuerzaRequest extends Request
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

            //"unidad"         =>    "required",
            //'responsable' =>    'required',
            //'fuerza_total' =>   'required|min:1|max:900',
            //'forman_total' =>   'required|min:1|max:900',
            //'faltan_total' =>   'required|min:1|max:900',
            'of_fuerza' =>  'required|min:1|max:900',
            'of_forman' =>  'required|min:1|max:900',
            'of_faltan' =>  'required|min:1|max:900',
            'cp_fuerza' =>  'required|min:1|max:900',
            'cp_forman' =>  'required|min:1|max:900',
            'cp_faltan' =>  'required|min:1|max:900',
            'sltp_fuerza' =>    'required|min:1|max:900',
            'sltp_forman' =>    'required|min:1|max:900',
            'sltp_faltan' =>    'required|min:1|max:900',
            'slc_fuerza' => 'required|min:1|max:900',
            'slc_forman' => 'required|min:1|max:900',
            'slc_faltan' => 'required|min:1|max:900',
            'ec_fuerza' =>  'required|min:1|max:900',
            'ec_forman' =>  'required|min:1|max:900',
            'ec_faltan' =>  'required|min:1|max:900',
            'alumnos_fuerza' => 'required|min:1|max:900',
            'alumnos_forman' => 'required|min:1|max:900',
            'alumnos_faltan' => 'required|min:1|max:900',
        ]; 
    }
}
