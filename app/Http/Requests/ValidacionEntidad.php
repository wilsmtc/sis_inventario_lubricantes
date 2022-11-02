<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEntidad extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->route('id')){
            return [
                    //editar
                    'nombre'=>'required|max:100|unique:entidad,nombre,'. $this->route('id'),
                    'direccion'=>'required|max:60',
                    'telefono'=>'nullable|min:5|max:10|unique:entidad,telefono,'. $this->route('id'),
                    'contacto_1'=>'required|min:5|max:10|unique:entidad,contacto_1,'. $this->route('id'),
                    'contacto_2'=>'nullable|min:5|max:10|unique:entidad,contacto_2,'. $this->route('id'),
                    'propietario'=>'nullable|max:100',
                    'mision'=>'nullable',
                    'vision'=>'nullable',
                    'descripcion'=>'nullable',
                    'color'=>'required',
                    'foto_up'=>'nullable|image|max:3000',
                    'foto_up'=>'nullable|image|max:1000',
                ];
            }
    }
}
