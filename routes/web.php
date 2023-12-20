<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;



Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile',  'profile')->name('profile');
        Route::put('/profile/update',  'update')->name('profile.update');
        Route::put('/change-password', 'changePassword')->name('changePassword');
    });

    Route::prefix('/backend/categories')->controller(CategoryController::class)->name('category.')->group(function(){
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::put('/update/{id}','update')->name('update');
        Route::delete('/delete/{id}','delete')->name('delete');
    });

    Route::prefix('/backend/subcategories')->controller(SubCategoryController::class)->name('subcategory.')->group(function(){
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::put('/update/{id}','update')->name('update');
        Route::delete('/delete/{id}','delete')->name('delete');
        Route::get('/get-subcategory-by-category', 'getSubcategory')->name('getSubcategory');
    });

    Route::prefix('/backend/posts')->controller(PostController::class)->name('post.')->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/show','show')->name('show');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::put('/update/{id}','update')->name('update');
        Route::delete('/delete/{id}','delete')->name('delete');
        Route::get('/change-status','change_status')->name('change_status');
        Route::get('/change-featured/{id}','change_featured')->name('change_featured');
    });


});





// Browser->Route->View
