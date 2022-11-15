<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function () {
    $data = [
        'nombre' => 'Alejandro',
        'apellido' => 'Ariaz'
    ];

    return response($data);
});
