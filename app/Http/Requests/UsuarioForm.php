<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioForm extends Request
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
        switch ($this->method()) {
            case 'POST':
                return [
                    "rut"         =>    "required|unique:usuarios",
                    "grado_id"    =>    "required",
                    "nombres"     =>    "required|min:3|max:500",
                    "apellido_p"  =>    "required|min:3|max:500",
                    "apellido_m"  =>    "required|min:3|max:500",
                    "password"    =>    "required|min:3|max:500",
                    "rol"         =>    "required",
                ];                
                break;
            case 'PUT':
                return [
                    "rut"         =>    "required",
                    "grado_id"    =>    "required",
                    "nombres"     =>    "required|min:3|max:500",
                    "apellido_p"  =>    "required|min:3|max:500",
                    "apellido_m"  =>    "required|min:3|max:500",
                    "password"    =>    "required|min:3|max:500",
                    "rol"         =>    "required",
                ];                
                break;
            default:
                # code...
                break;
        }

    }

    public function messages()
    {
        return [
            "rut"           =>    "rut requerido",
            "grado_id"      =>    "grado requerido",
            "nombres"       =>    "nombre requerido",
            "apellido_p"    =>    "apellido paterno requerido",
            "apellido_m"    =>    "apellido materno requerido",
            "password"      =>    "contraseña requerida",
            "rol"           =>    "seleccione rol",
        ];
    }
}
