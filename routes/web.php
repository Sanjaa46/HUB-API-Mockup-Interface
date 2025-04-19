<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [InfoController::class, 'info']);
Route::get('/health', [InfoController::class, 'healthCheck']);
Route::get('/docs/readme', [InfoController::class, 'readme']);
Route::get('/docs/installation', [InfoController::class, 'installation']);

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// The GraphQL endpoint is automatically registered by the lighthouse package 
// at /graphql based on the default configuration

// For compatibility with the "Мэдээллийн урсгалыг удирдах орчин" system,
// we'll also expose the GraphQL endpoint at /gateway
Route::any('/gateway', function (Request $request) {
    return app()->handle(
        Request::create('/graphql', $request->method(), $request->all())
    );
});