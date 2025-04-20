<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/




Route::get('/', function () {
    return response()->json([
        'name' => 'HUB API Mockup Interface',
        'description' => 'Temporary mockup for the "Мэдээллийн урсгалыг удирдах орчин"',
        'version' => '1.0.0',
        'endpoint' => url('/graphql')
    ]);
});

