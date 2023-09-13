<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;



class MultipleSubscriptionsRequest extends FormRequest

{

    public function rules()

    {

        return [
            '*.codice_catalogo' => 'required',
            '*.codice_edizione' => 'required',
            '*.data_inizio' => 'required',
            '*.data_fine' => 'required',
            '*.codice_azienda_rapporto_lav' => 'required',
            '*.ragione_sociale' => 'required',
            '*.codice_ateco' => 'required',
            '*.codice_azienda_soggetto' => 'required',
            '*.codice_identificativo_soggetto' => 'required',
            '*.nome' => 'required',
            '*.cognome' => 'required',
            '*.codice_fiscale' => 'required',
            '*.email' => 'required',
            '*.data_nascita' => 'required',
            '*.luogo_nascita' => 'required',
            '*.nome_utente' => 'required',
            '*.tipo_utente' => 'required',
            '*.test_esterno' => 'required',
            '*.aula' => 'required',
        ];
    }



    public function failedValidation(Validator $validator)

    {
        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));
    }

    public function messages()

    {

        return [

            'codice_catalogo.*.required' => 'codice_catalogo is required',
            'codice_edizione.*.required' => 'codice_edizione is required',
            'data_inizio.*.required' => 'data_inizio is required',
            'data_fine.*.required' => 'data_fine is required',
            'codice_azienda_rapporto_lav.*.required' => 'codice_azienda_rapporto_lav is required',
            'ragione_sociale.*.required' => 'required',
            'codice_ateco.*.required' => 'required',
            'codice_azienda.*.required' => 'required',
            'codice_identificativo_soggetto.*.required' => 'required',
            'nome.*.required' => 'required',
            'cognome.*.required' => 'required',
            'codice_fiscale.*.required' => 'required',
            'email.*.required' => 'required',
            'data_nascita.*.required' => 'required',
            'luogo_nascita.*.required' => 'required',
            'nome_utente.*.required' => 'required',
            'tipo_utente.*.required' => 'required',
            'test_esterno.*.required' => 'required',
            'aula.*.required' => 'required',
        ];
    }
}
