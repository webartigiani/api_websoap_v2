<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\SubscriptionRequest;
// use App\Http\Requests\DeleteSubscriptionRequest;

use App\Classes\connettore;


class SubscriptionController extends Controller
{
    public function addSubscription(Request $request)
    {
        $payload = $request->getContent();
        return json_decode(connettore::iscrizione($payload, "iscrivi"));
    }

    public function deleteSubscription(Request $request)
    {
        $payload = $request->get('id');
        return json_decode(connettore::iscrizione($payload, "disiscrivi"));
    }
}
