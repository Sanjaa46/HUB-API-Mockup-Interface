<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Rebing\GraphQL\GraphQLController;

// Add this test route
Route::get('test', function() {
    return response()->json(['message' => 'API is working!']);
});

Route::post('graphql', [GraphQLController::class, 'query']);
Route::get('graphql', [GraphQLController::class, 'query']);