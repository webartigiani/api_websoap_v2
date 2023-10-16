<?php
namespace App\Classes;
use App\Classes\processa;
use App\Http\Controllers\SoapController;
/*
require_once("../zmlibs/connettore.php");
connettore::catalogo($payload);
connettore::iscrizione($payload);
connettore::iscrizionemultipla($payload);
connettore::modificaedizione($payload);
*/

// require_once("../zmlibs/lib.php");

class connettore
{
    public static function login($payload)
    {
        return processa::login($payload);
    }

    public static function validateToken($token)
    {
        return processa::validateToken($token);
    }

    public static function catalogo($payload)
    {
        return processa::catalogo($payload);
    }

    public static function iscrizione($payload, $metodo)
    {
        return processa::iscrizione($payload, $metodo);
    }

    public static function iscrizionemultipla($payload, $metodo)
    {
        return processa::iscrizionemultipla($payload, $metodo);
    }

    public static function modificaedizione($payload)
    {
        return processa::modificaedizione($payload);
    }

    public static function inviarisultato($payload)
    {
        return SoapController::soapTest($payload);
    }
}
