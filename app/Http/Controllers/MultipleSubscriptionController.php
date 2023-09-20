<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Classes\connettore;
// use App\Http\Requests\MultipleSubscriptionsRequest;
// use App\Http\Requests\SubscriptionRequest;


class MultipleSubscriptionController extends Controller
{
    public function addSubscriptions(Request $request)
    {
        $payload = $request->getContent();
        return json_decode(connettore::iscrizionemultipla($payload, "iscrivi"));
    }

    public function deleteSubscriptions(Request $request)
    {
        $payload = $request->get('id');
        return json_decode(connettore::iscrizionemultipla($payload, "disiscrivi"));
    }
}
