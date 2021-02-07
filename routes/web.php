<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\MainPagesController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\CreateNewPomCtrl;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//
Route::get('/cache', function() {
	Artisan::call('config:cache');
	return 'OK';
});

Route::get('/', [MainPagesController::class, 'homepage']);
Route::get('/pomeranian', [MainPagesController::class, 'poms'])->name('poms.all');

// auth
Auth::routes();

// admin pages
Route::middleware('auth')->prefix('/admin')->group(function() {
	Route::get('/', [AdminPagesController::class, 'index'])->name('admin');
	Route::get('/create', [AdminPagesController::class, 'createPom'])->name('create.new.pom');
}); 