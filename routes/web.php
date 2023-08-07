<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

Route::controller(LinkController::class)->group(function () {
    Route::get('/', 'create')->name('link.create');
    Route::post('/store','store')->name('link.store');
    Route::get('/{token}','show')->name('link.show');
    Route::get('/not_found', 'notFound')->name('link.not_found');
});

