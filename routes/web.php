<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homePage');
});
Route::get('/adminPage', function () {
    return view('Admin.adminMainPage');
});
Route::get('/Admin/menuManagement',[AdminController::class,'menuManagement'])->name('Admin.menuManagement');
