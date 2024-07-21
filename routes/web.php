<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ClientController::class, 'home']);


Route::group(['middleware' => ['admin']], function () {

    //admin
    Route::get('admin', [AdminController::class, 'home']);

    //AdminProductsController
    Route::get('admin/product/list', [AdminProductController::class, 'list']);
    Route::get('admin/product/add', [AdminProductController::class, 'add']);
    Route::get('admin/product/edit/{id}', [AdminProductController::class, 'edit'])->name('edit');
    Route::get('admin/product/delete/{id}', [AdminProductController::class, 'delete'])->name('deleteProduct');
    Route::post('admin/product/store', [AdminProductController::class, 'store']);
    Route::post('admin/product/storeUpdate/{id}', [AdminProductController::class, 'storeUpdate'])->name('storeUpdateProduct');

    //Admin Category
    Route::get('admin/category/list', [AdminCategoryController::class, 'list']);
    Route::get('admin/category/add', [AdminCategoryController::class, 'add']);
    Route::post('admin/category/store', [AdminCategoryController::class, 'store']);
    Route::get('admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('editCategory');
    Route::get('admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('deleteCategory');
    Route::post('admin/category/storeUpdate/{id}', [AdminCategoryController::class, 'storeUpdate'])->name('storeUpdateCategory');

    //Admin User
    Route::get('admin/user/list', [AdminUserController::class, 'list']);
    Route::get('admin/user/add', [AdminUserController::class, 'add']);
});
//client
Route::get('home', [ClientController::class, 'home']);
Route::get('category/{id}', [ClientController::class, 'category'])->name('category');
Route::get('detailProduct/{id}', [ClientController::class, 'detailProduct'])->name('detailProduct');
Route::post('addToCart/{id}', [ClientController::class, 'addToCart'])->name('addToCart');
Route::get('cart', [ClientController::class, 'cart']);
Route::get('checkout', [ClientController::class, 'checkout'])->name('checkout');
Route::post('checkoutStore', [ClientController::class, 'checkoutStore'])->name('checkoutStore');
Route::get('deleteCart/{id}', [ClientController::class, 'deleteCart'])->name('deleteCart');

//account
Route::get('login', [AccountController::class, 'login']);
Route::get('logout', [AccountController::class, 'logout'])->name('logout');
Route::post('loginStore', [AccountController::class, 'loginStore'])->name('loginStore');
Route::post('register', [AccountController::class, 'register'])->name('register');
Route::get('dashbroad', [AccountController::class, 'dashbroad'])->name('dashbroad');
