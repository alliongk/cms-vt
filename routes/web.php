<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

// front
Route::name('front.')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('welcome');
    Route::get('/detail_vt/{slug}', [LandingPageController::class, 'detail_vt'])->name('details-vt');
    Route::get('/search', [LandingPageController::class, 'search'])->name('search');
});

// Dashboard
Route::name('home.')->middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // form
    Route::get('forms', [FormController::class, 'index'])->name('forms.index');
    Route::get('forms/data', [FormController::class, 'data'])->name('forms.data');

    Route::get('forms/create', [FormController::class, 'create'])->name('forms.create');
    Route::post('forms/store', [FormController::class, 'store'])->name('forms.store');

    Route::get('forms/edit/{id}', [FormController::class, 'edit'])->name('forms.edit');
    Route::post('forms/update/{id}', [FormController::class, 'update'])->name('forms.update');

    Route::post('forms/delete/{id}', [FormController::class, 'destroy'])->name('forms.delete');

    Route::get('status-update/{id}', [FormCOntroller::class, 'status_update']);
});
