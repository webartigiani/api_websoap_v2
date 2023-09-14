<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\connettore;

class TokenController extends Controller
{
    public function login(Request $request)
    {
        $payload = $request->getContent();
        return json_decode(connettore::login($payload));
    }
}
