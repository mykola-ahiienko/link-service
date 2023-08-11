<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

Route::controller(LinkController::class)->group(function () {
    Route::get('/', 'index')->name('link.index');

    Route::get('/create', 'create')->name('link.create');
    Route::post('/store','store')->name('link.store');

    Route::get('/{token}','show')->name('link.show');

    Route::get('/{link}/edit', 'edit')->name('link.edit');
    Route::put('/{link}', 'update')->name('link.update');

    Route::delete('/{link}', 'delete')->name('link.delete');
    Route::get('/not_found', 'notFound')->name('link.not_found');
});

