<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\RecordController;
use App\Http\Controllers\citizen\CitizenFormController;
use App\Http\Controllers\citizen\CitizenLoginController;
use App\Http\Controllers\citizen\CitizenHomeController;
use App\Http\Controllers\citizen\PersonalInfoController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/registerpage', [HomepageController::class, 'show'])->name('registerpage');
Route::post('/register', [HomepageController::class, 'register'])->name('register');


Route::group(['prefix' => 'admin'],function()
{
    
    Route::group(['middleware' => 'admin.guest'],function()
    {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });


    Route::group(['middleware' => 'admin.auth'],function()
    {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        Route::get('/record', [RecordController::class, 'index'])->name('admin.record');
        Route::post('/import', [RecordController::class, 'importexceldata'])->name('importexceldata');

        Route::post('/import-location-data', [RecordController::class, 'importLocationData'])->name('importLocationData');


        Route::get('/export', [RecordController::class, 'exportexceldata'])->name('exportexceldata');
        Route::get('/download', [RecordController::class, 'download'])->name('downloadsamplefile');

        Route::get('/citizen/{id}/view', [RecordController::class, 'view'])->name('view_citizen');
        Route::get('/citizen/{id}/edit', [RecordController::class, 'editpage'])->name('show_editpage');
        Route::put('/citizen/{id}/update', [RecordController::class, 'update'])->name('update_citizen');
        Route::delete('/citizen/{id}', [RecordController::class, 'destroy'])->name('delete_citizen');
    });
});

Route::group(['prefix' => 'citizen'],function()
{
    
    Route::group(['middleware' => 'citizen.guest'],function()
    {
        Route::get('/citizenlogin', [CitizenLoginController::class, 'index'])->name('citizen.login');
        Route::post('/authenticate', [CitizenLoginController::class, 'authenticate'])->name('citizen.authenticate');
    });

    Route::group(['middleware' => 'citizen.auth'],function()
    {
        Route::get('/dashboard', [CitizenHomeController::class, 'index'])->name('citizen.dashboard');
        Route::get('/logout', [CitizenHomeController::class, 'logout'])->name('citizen.logout');

        Route::get('/applicationform', [CitizenFormController::class, 'index'])->name('citizen.form');
        Route::post('/form/store', [CitizenFormController::class, 'store'])->name('citizen.form.store');
        Route::get('/info/{id}', [CitizenFormController::class, 'view'])->name('citizen.information');
        
    });
});