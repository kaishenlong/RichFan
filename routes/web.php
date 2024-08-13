<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\Users\ClientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Users\UsersController;



Route::get('/', function () {
    return redirect()->route('client.home');
});
Route::get('login',[AuthenController::class,'login'])->name('login');
Route::post('login',[AuthenController::class,'postLogin'])->name('postLogin');
Route::get('logout',[AuthenController::class,'logout'])->name('logout');
Route::get('register',[AuthenController::class,'register'])->name('register');
Route::post('register',[AuthenController::class,'postRegister'])->name('postRegister');

Route::get('forgot-password', [MailController::class, 'forgotPass'])->name('forgotPass');
Route::post('forgot-password', [MailController::class, 'postForgotPass'])->name('postForgotPass');

Route::get('get-password/{user}/{token}', [MailController::class, 'getPass'])->name('getPass');
Route::post('get-password/{user}/{token}', [MailController::class, 'postGetPass'])->name('postGetPass');


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin',
    ],function(){
        // tai khoan
        Route::group([
            'prefix' => 'user',
            'as' => 'user.',
        ],function(){
        Route::get('home', [UserController::class, 'home'])->name('home');
        Route::get('list-users', [UserController::class, 'listUsers'])->name('listUsers');
        Route::post('add-users', [UserController::class, 'addUsers'])->name('addUsers');
        Route::delete('delete-users', [UserController::class, 'deleteUsers'])->name('deleteUsers');
        Route::get('detail-users', [UserController::class, 'detailUsers'])->name('detailUsers');
        Route::patch('update-users', [UserController::class, 'updateUsers'])->name('updateUsers');

        });
        // quan ly san pham
        Route::group([
            'prefix' => 'product',
            'as' => 'product.',
        ],function(){
        Route::get('list-product',[ProductController::class,'listProduct'])->name('listProduct');
        Route::post('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::delete('delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('detail-product', [ProductController::class, 'detailProduct'])->name('detailProduct');
        Route::patch('update-product', [ProductController::class, 'updateProduct'])->name('updateProduct');
        });

        Route::group(['prefix'=> 'category', 'as' => 'category.'
        ],function(){
            Route::get('list-category',[CategoryController::class, 'listCategory'])->name('listCategory');
            Route::post('add-category',[CategoryController::class, 'addCategory'])->name('addCategory');
            Route::delete('delete-category',[CategoryController::class, 'deleteCategory'])->name('deleteCategory');
            Route::get('detail-category',[CategoryController::class, 'detailCategory'])->name('detailCategory');
            Route::patch('update-category',[CategoryController::class, 'updateCategory'])->name('updateCategory');
        });
});

    // group client
    Route::group([
        'prefix' => 'client',
        'as' => 'client.',
    ],function(){
        Route::get('home',[ClientController::class,'home'])->name('home');
        Route::get('product/{id}', [ClientController::class, 'detailProduct'])->name('detailProduct');
        Route::get('category/{id}', [ClientController::class, 'detailCategory'])->name('category');
        Route::get('search', [ClientController::class, 'search'])->name('search');

        Route::group([
            'middleware' => 'checkUser'
        ], function() {
            Route::post('add-to-cart', [UsersController::class, 'addToCart'])->name('addToCart');
            Route::get('view-cart', [UsersController::class, 'viewCart'])->name('viewCart');
            Route::patch('update-cart', [UsersController::class, 'updateCart'])->name('updateCart');
            Route::get('delete-cart/{id}', [UsersController::class, 'deleteCart'])->name('deleteCart');
    
        });
    });
