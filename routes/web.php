<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\User\UserStoreController;
use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\DashboardController;

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

Route::group(['middleware'=> 'auth'],function () {
    Route::get('panel',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('passwordCheck',[DashboardController::class,'passwordCheck'])->name('passwordCheck');
});

// Route::group(['middleware'=> ['auth','isAdmin'],'prefix'=>'admin'],function () {
//     Route::resource('stores', StoreController::class);
// });
Route::group(['middleware'=> ['auth','role:IT Super Admin'],'prefix'=>'admin'],function () {
    Route::get('userlist/{id}',[UserListController::class,'destroy'])->whereNumber('id')->name('store.destroy');
    Route::resource('userlist', UserListController::class);
});
Route::group(['prefix'=>'user'],function () {
    Route::get('store/{slug}',[UserStoreController::class,'listele'])->name('store.listele');
    Route::resource('store', UserStoreController::class);
});
Route::group(['prefix'=>'common'],function () {
    Route::get('password/{id}',[CommonController::class,'destroy'])->whereNumber('id')->name('password.destroy');
    Route::get('password/{id}/clone',[CommonController::class,'clone'])->whereNumber('id')->name('password.clone');
    Route::get('password/{id}/cloneedit',[CommonController::class,'clone_edit'])->whereNumber('id')->name('password.clone_edit');
    Route::put('password/{id}/cloneupdate',[CommonController::class,'clone_update'])->whereNumber('id')->name('password.clone_update');
    Route::resource('password', CommonController::class);
});
