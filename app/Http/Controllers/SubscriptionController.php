<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Requests\DeleteSubscriptionRequest;


class SubscriptionController extends Controller
{
    public function addSubscription(SubscriptionRequest $request)
    {
        return response()->json([
            "rc" => $request->getContent()
        ]);
    }

    public function deleteSubscription(DeleteSubscriptionRequest $request)
    {
        return response()->json([
            "rc" => "__OK__"
        ]);
    }
}
