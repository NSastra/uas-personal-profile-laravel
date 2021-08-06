<?php

use App\Http\Controllers\Api\BiodataController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PendidikanController;
use App\Http\Controllers\Api\ResumeController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', [BiodataController::class, 'index']);

Route::resources([
    'biodata' => BiodataController::class,
    'pendidikan' => PendidikanController::class,
    'resume' => ResumeController::class,
    'contact' => ContactController::class
]);
