<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TokoBajuController;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\API\TokoBajuController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Membuat API routes untuk setiap methods di controller
// Route::get("/baju", [TokoBajuController::class, "index"]);
// Route::post("/baju", [TokoBajuController::class, "create"]);
// Route::put("/baju/{id}", [TokoBajuController::class, "update"]);
// Route::delete("/baju/{id}", [TokoBajuController::class, "delete"]);


Route::post("/signup", [AuthController::class, "signup"]);
Route::post("/signin", [AuthController::class, "signin"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('tokobaju', TokoBajuController::class);
});
