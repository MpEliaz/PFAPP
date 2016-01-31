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
                    "unidad_id"    =>    "required",
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
            "rut.required"           =>    "Rut requerido",
            "grado_id.required"      =>    "Grado requerido",
            "nombres.required"       =>    "Nombre requerido",
            "apellido_p.required"    =>    "Apellido paterno requerido",
            "apellido_m.required"    =>    "Apellido materno requerido",
            "password.required"      =>    "Contraseña requerida",
            "rol.required"           =>    "Selecciona un rol",
            "unidad_id.required"     =>    "Selecciona unidad"
        ];
    }
}
