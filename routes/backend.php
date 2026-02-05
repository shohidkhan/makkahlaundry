<?php

use App\Http\Controllers\Web\Backend\CMS\CreateAccountController;
use App\Http\Controllers\Web\Backend\CMS\Home\BannerController;
use App\Http\Controllers\Web\Backend\CMS\HomeHowWorkController;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Frontend\WhatsAppController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::controller(WhatsAppController::class)->group(function () {
    Route::get('/whatsapp', 'index')->name('admin.whatsapp.index');
    Route::post('/whatsapp/update', 'update')->name('admin.whatsapp.update');
});

Route::prefix('/cms')->name('admin.cms.')->group(function () {
    Route::controller(BannerController::class)->group(callback: function () {
        Route::get("/banner", 'index')->name('banner.index');
        Route::get("/add-banner", 'create')->name('banner.create');
        Route::post("/banner/store", 'store')->name('banner.store');
        Route::get("/banner/{id}/edit",'edit')->name('banner.edit');
        Route::get("/banner/{id}/status/change",'changeStatus')->name('banner.changeStatus');
        Route::post("/banner/{id}/update",'update')->name('banner.update');
        Route::get("/banner/{id}/delete",'delete')->name('banner.delete');
    });

    Route::controller(HomeHowWorkController::class)->group(function () {
        Route::get('/home-how-work', 'index')->name('home-how-work.index');
        Route::get('/home-how-work/create', 'create')->name('home-how-work.create');
        Route::get('/home-how-work/{id}/edit', 'edit')->name('home-how-work.edit');
        Route::post('/home-how-work/{id}/update', 'update')->name('home-how-work.updates');
        Route::post('/home-how-work-update', 'homeHowWorkUpdate')->name('home-how-work.update');
        Route::post('/home-how-work/store', 'store')->name('home-how-work.store');
        Route::delete('/home-how-work/{id}/delete', 'destroy')->name('home-how-work.destroy');
    });

    Route::controller(CreateAccountController::class)->group(function () {
        Route::get('/account', 'index')->name('account.index');
        Route::post('/account/update', 'update')->name('account.update');
    });

});
