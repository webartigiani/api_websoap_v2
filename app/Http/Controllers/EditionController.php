<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\connettore;
// use App\Http\Requests\CatalogRequest;


class EditionController extends Controller
{
    public function __invoke(Request $request)
    {
        $payload = json_decode($request->getContent());
        return json_decode(connettore::modificaedizione($payload));
    }
}
