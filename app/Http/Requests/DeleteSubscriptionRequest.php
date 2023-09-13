<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;



class DeleteSubscriptionRequest extends FormRequest

{

    public function rules()

    {

        return [
            'codice_edizione' => 'required',
            'azienda_soggetto' => 'required',
            'codice_identificativo_soggetto' => 'required',
        ];
    }



    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'rc'   => "__KO__",

            'msg'  => $validator->errors(),

            'code' => 401

        ]));
    }

    public function messages()

    {

        return [
            'codice_edizione.required' => 'codice_edizione is required',
            'azienda_soggetto.required' => 'azienda_soggetto is required',
            'codice_identificativo_soggetto.required' => 'required',
        ];
    }
}
