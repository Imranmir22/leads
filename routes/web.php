<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/json-leads', [App\Http\Controllers\LeadController::class, 'leads_json'])->name('admin.leads.json');
        Route::resource('/leads', App\Http\Controllers\LeadController::class ,['as'=>'admin']);

    });

});
