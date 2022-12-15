<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\UserStoreController;

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

Route::redirect('/', 'login');

Route::middleware(['auth', 'verified'])->get('/panel', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=> ['auth','isAdmin'],'prefix'=>'admin'],function () {
    Route::resource('stores', StoreController::class);
});
Route::group(['middleware'=> ['auth','isAdmin'],'prefix'=>'user'],function () {
    Route::resource('store', UserStoreController::class);
});
