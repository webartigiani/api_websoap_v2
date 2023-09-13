<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;



class CatalogRequest extends FormRequest

{

    public function rules()

    {

        return [
            'codice_catalogo' => 'required',
            'titolo_corso' => 'required',
            'strutturazione' => 'required',
            'obiettivi' => 'required',
            'contenuti' => 'required',
            'aspetti_metodologici' => 'required',
            'azienda_area' => 'required',
            'codice_area' => 'required',
            'descrizione_area' => 'required',
            'prerequisiti' => 'required',
            'test_esterno' => 'required',
            'aula' => 'required',
        ];
    }



    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'rc'   => "__KO__",

            'msg'   => $validator->errors(),

            'code'  => 401

        ]));
    }

    public function messages()

    {

        return [

            'codice_catalogo.required' => 'codice_catalogo is required',
            'titolo_corso.required' => 'titolo_corso is required',
            'strutturazione.required' => 'strutturazione is required',
            'obiettivi.required' => 'obiettivi is required',
            'contenuti.required' => 'contenuti is required',
            'aspetti_metodologici.required' => 'required',
            'azienda_area.required' => 'required',
            'codice_area.required' => 'required',
            'descrizione_area.required' => 'required',
            'prerequisiti.required' => 'required',
            'test_esterno.required' => 'required',
            'aula.required' => 'required',
        ];
    }
}
