<?php

namespace App\Classes;
// Questa riga sarà attiva e servirà per importare le funzionalità di moodle necessarie
//require_once('../config.php');

// al posto di questa riga ci sarà una chiamata db
global $wsaccount;
$wsaccount = (object)["username"=>"zucchetticlient", "password"=>"85rV!w2DSV_<Y2jX-VG(m4kK{2[k3|", "salt"=>"pKNGC6WUs_cb3~G?Q-nu3<|m%84Cp!"];

class processa
{
    public static function login($payload)
    {
        global $wsaccount;
        $wsuser = (object)json_decode($payload);
        if ($wsuser->Username != $wsaccount->username or $wsuser->Password != $wsaccount->password) {
            return json_encode(["rc" => "__KO__", "msg" => "Credenziali errate", "code"=>"401"]);
        }
        $header = json_encode(["alg" => "HS256", "typ" => "JWT"]);
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
        $secret = hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $wsaccount->salt, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($secret));
        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
        // qui ci sarà una query che insrirà il token in db con la data di creazione
        return json_encode(["rc" => "__OK__", "data" => ["authorizationKey" => $jwt]]);
    }

    public static function validateToken($token)
    {
        global $wsaccount;
        // codice temporaneo, il token verrà recuperato da db e verrà verificata l'uguaglianza e la scadenza (scadono alla mezzanotte del giorno in cui vengono generati).
        list($header, $payload, $secret) = explode(".", $token);
        $tempsecret = hash_hmac('sha256', $header . '.' . $payload, $wsaccount->salt, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($tempsecret));
        return $base64UrlSignature == $secret;
    }

    public static function catalogo($payload)
    {
        if (rand() % 2 == 0) {
            return json_encode(["rc" => "__KO__", "msg" => "Errore di test", "code" => "100"]);
        } else {
            return json_encode(["rc" => "__OK__"]);
        }
        // verifica integrità dati
        // verifica se il corso è esistente
        // crea il corso.
    }

    public static function iscrizione($payload)
    {
        if (rand() % 2 == 0) {
            return json_encode(["rc" => "__KO__", "msg" => "Errore di test", "code" => "100"]);
        } else {
            return json_encode(["rc" => "__OK__"]);
        }
        $dati = (object)json_decode($payload);
        // verifica integrità dati
        // verifica se l'utente esiste
        // verifica se il corso è esistente
        // verifica se l'utente è già iscritto al corso (magari ad una edizione diversa)
        // iscrivi l'utente
    }

    public static function iscrizionemultipla($payload)
    {
        if (rand() % 2 == 0) {
            return json_encode(["rc" => "__KO__", "msg" => "Errore di test", "code" => "100"]);
        } else {
            return json_encode(["rc" => "__OK__"]);
        }
        // cicla gli utenti, per ognuno
        // verifica integrità dati
        // verifica se l'utente esiste
        // verifica se il corso è esistente
        // verifica se l'utente è già iscritto al corso (magari ad una edizione diversa)
        // iscrivi l'utente
    }

    public static function modificaedizione($payload)
    {
        if (rand() % 2 == 0) {
            return json_encode(["rc" => "__KO__", "msg" => "Errore di test", "code" => "100"]);
        } else {
            return json_encode(["rc" => "__OK__"]);
        }
        // verifica integrità dati
        // verifica se l'edizione esiste
        // applica le modifiche o creala
    }
}
