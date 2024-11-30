<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['recipe-api' => 'laravel-mongodb powered ',
            'routes'=>'/recipes,/recipes/{recipe},/favorites?f={recipe,recipe,..}'];
});
Route::get('/migrate', function () {
    try {
        Artisan::call('migrate', ['--force' => true]); // Force to avoid confirmation in production
        return response()->json(['message' => 'Migrations executed successfully!']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
Route::get('/seed', function () {
    try {
        Artisan::call('db:seed', ['--force' => true]); // Force to avoid confirmation in production
        return response()->json(['message' => 'Seeders executed successfully!']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

require __DIR__.'/auth.php';
