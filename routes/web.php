<?php

use Illuminate\Support\Facades\Route;
use Rebing\GraphQL\GraphQLController;

Route::get('/', function () {
    return view('welcome');
});

// Add the GraphQL routes directly to the web group
Route::match(['get', 'post'], 'graphql', [GraphQLController::class, 'query']);