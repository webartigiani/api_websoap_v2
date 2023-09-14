<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Classes\connettore;
// use App\Http\Requests\MultipleSubscriptionsRequest;
// use App\Http\Requests\SubscriptionRequest;


class MultipleSubscriptionController extends Controller
{
    public function __invoke(Request $request)
    {
        $payload = $request->getContent();
        return json_decode(connettore::iscrizionemultipla($payload));
    }
}
