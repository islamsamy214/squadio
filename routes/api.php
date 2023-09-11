<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;

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

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['as' => 'api.'], function () {
    Route::apiResource('/items', ItemController::class)->except(['create', 'edit', 'update', 'destroy']);
    Route::get('/statistics/items', [ItemController::class, 'statistics'])->name('items.statistics');
});
