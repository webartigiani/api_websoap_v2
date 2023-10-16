<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\MultipleSubscriptionController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\SoapController;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', [TokenController::class, 'login']);
Route::post('/soapTest', [SoapController::class, 'soapTest']);
Route::post('/catalogo', CatalogController::class)->middleware('auth');
Route::post('/modificaedizione', EditionController::class)->middleware('auth');
Route::post('/iscrizione', [SubscriptionController::class, 'addSubscription'])->middleware('auth');
Route::delete('/iscrizione', [SubscriptionController::class, 'deleteSubscription'])->middleware('auth');
Route::post('/iscrizionemultipla', [MultipleSubscriptionController::class, 'addSubscriptions'])->middleware('auth');
Route::delete('/iscrizionemultipla', [MultipleSubscriptionController::class, 'deleteSubscriptions'])->middleware('auth');
