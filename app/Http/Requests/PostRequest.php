<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

trait PostRequest
{
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'title'          => 'required|min:2|max:60',
            'text'           => 'required|min:2|max:100',
            'author'         => 'required|min:2|max:30',
            'date'           => 'required|between: 5,20',
            'address'       => 'required|min:20', // nullable = no requerido
        ];
    }
    
    public function messages() {
        $required = 'El campo :attribute es obligatorio.';
        $min      = 'El campo :attribute no tiene la longitud mínima requerida :min';
        $max      = 'El campo :attribute supera la longitud máxima requerida :max';
        $between  = 'El campo :attribute debe tener entre :min y :max caracteres.';
        return [
                'name.required'          => $required,
                'name.min'               => $min,
                'name.max'               => $max,
                'phone.required'         => $required,
                'phone.min'              => $min,
                'phone.max'              => $max,
                'contactperson.required' => $required,
                'contactperson.min'      => $min,
                'contactperson.max'      => $max,
                'taxnumber.required'     => $required,
                'taxnumber.between'      => $between,
                'address.required'       => $required,
                'address.min'            => $min,
            ];
    }
    
    public function attributes() {
        return [
            'name'          => 'nombre de la empresa',
            'phone'         => 'número de teléfono',
            'contactperson' => 'persona de contacto',
            'taxnumber'     => 'código de identificación fiscal',
            'address'       => 'dirección de la empresa',
            ];
    }
}
