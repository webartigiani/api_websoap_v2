<?php
namespace App\Classes;
use App\Classes\processa;
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

    public static function iscrizione($payload)
    {
        return processa::iscrizione($payload);
    }

    public static function iscrizionemultipla($payload)
    {
        return processa::iscrizionemultipla($payload);
    }

    public static function modificaedizione($payload)
    {
        return processa::modificaedizione($payload);
    }
}