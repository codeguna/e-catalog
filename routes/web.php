<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Mail\TestMail;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontEndController::class, 'home']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/test-email', function () {
    Mail::to('gunadhi@lpkia.ac.id')->send(new TestMail());

    return 'Email berhasil dikirim!';
});
Route::get('/login-admin', 'Auth\LoginController@adminForm');

Route::group(['prefix' => 'product'], function () {
    Route::get('/paket', [FrontEndController::class, 'ProductPaket'])->name('paket');
    Route::get('/satuan', [FrontEndController::class, 'ProductSatuan'])->name('satuan');
    Route::get('/sekolah', [FrontEndController::class, 'ProductSekolah'])->name('sekolah');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/addToCart/{id}', [FrontEndController::class, 'addToCart'])->name('addcart');
    Route::get('/mycart', [FrontEndController::class, 'myCart'])->name('myCart');
    Route::post('/proceed', [FrontEndController::class, 'proceed'])->name('proceed');
    Route::resource('cart-items', 'CartItemController');
    Route::get('/deleteSelected/{id}', [CartItemController::class, 'deleteSelected'])->name('delete');
    Route::get('/myorder', [FrontEndController::class, 'myOrder'])->name('myorder');

});

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');

    Route::resource('products', 'ProductController');
    Route::resource('configs', 'ConfigController');
    Route::resource('orders', 'OrderController');
    
    Route::get('/updateorder/{id}', [OrderController::class, 'updateOrder'])->name('updateorder');
});
