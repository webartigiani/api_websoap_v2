<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\CatalogRequest;


class CatalogController extends Controller
{
    public function __invoke(CatalogRequest $request)
    {
        return response()->json([
            "rc" => "__OK__"
        ]);
    }
}
