<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
// use App\Http\Requests\MultipleSubscriptionsRequest;
use App\Http\Requests\SubscriptionRequest;


class MultipleSubscriptionController extends Controller
{
    public function __invoke(Request $request)
    {
        $rules = [
            'codice_catalogo' => 'required',
            'codice_edizione' => 'required',
            'data_inizio' => 'required',
            'data_fine' => 'required',
            'codice_azienda_rapporto_lav' => 'required',
            'ragione_sociale' => 'required',
            'codice_ateco' => 'required',
            'codice_azienda_soggetto' => 'required',
            'codice_identificativo_soggetto' => 'required',
            'nome' => 'required',
            'cognome' => 'required',
            'codice_fiscale' => 'required',
            'email' => 'required',
            'data_nascita' => 'required',
            'luogo_nascita' => 'required',
            'nome_utente' => 'required',
            'tipo_utente' => 'required',
            'test_esterno' => 'required',
            'aula' => 'required',
        ];

        foreach ($request->all() as $key => $req) {
            $validator = Validator::make($req, $rules);
            $errors = [];

            if ($validator->fails()) {
                $errors[$key] = $validator->errors();
            }
        }

        $data = [];

        foreach ($request->all() as $key => $req) {
            if (array_key_exists($key, $errors)) {
                $data[$key] = [
                    "rc" => "__KO__",
                    "msg" => $errors[$key],
                    "code" => 401
                ];
            } else {
                $data[$key] = [
                    "rc" => "__OK__",
                    "data" => $req,
                ];
            }
        }

        // return response()->json([
        //     ...$data
        // ]);

        return response()->json($data);
    }
}
