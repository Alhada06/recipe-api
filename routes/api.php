<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test', function () {
    $data=[
        'status' => true,
        'message' => 'test'
    ];
    return response()->json($data);
//     return response()->json([
//        'status' => true,
//        'message' => 'test'
//    ]);
});
//Route::get('/recipes/{favorites}',function ($favorites){
//
//        // Split the string into an array
//        $numbers = explode(',', $favorites);
//
//        // Return the numbers as a response
//        return response()->json($numbers);
//})->where('favorites', '^[0-9,]+$');
Route::get('recipes/favorites', [RecipeController::class, 'favorites']);
Route::apiResource('recipes', RecipeController::class)->only(['index', 'show','favorites']);
