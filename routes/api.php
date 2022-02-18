<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\Api\V1\NotesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('notes')->group(function(){
    Route::get('/',[NotesController::class,'index']);
    Route::post('/store',[NotesController::class,'store']);
    Route::put('/{id}',[NotesController::class,'update']);
    Route::delete('/{id}',[NotesController::class,'destroy']);
});