<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SupplierCustomerController;
use App\Http\Controllers\Admin\AdminFrontendController;

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

Route::get('/',[AdminFrontendController::class,'index'])->name('home.index');
Route::get('/single-post/{slug}',[AdminFrontendController::class,'singlepost'])->name('single.post');
Route::get('category/{slug}',[AdminFrontendController::class,'postbycategory'])->name('show.category.wise');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//category routes
Route::resource('post-category', CategoryController::class);
Route::post('post-category-create', [CategoryController::class, 'store'])->name('post.category.create');
Route::get('all-category',[CategoryController::class, 'allcategory'])->name('all-category');
Route::get('edit-category/{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('edit-category/{id}',[CategoryController::class, 'update'])->name('category.update');
Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);

//post routes
Route::resource('post', PostController::class);
Route::post('post-create', [PostController::class, 'store']);
Route::get('post-edit/{id}',[PostController::class,'edit'])->name('post.edit');
Route::put('post-update',[PostController::class,'postupdate'])->name('post.update');
Route::get('delete-post/{id}',[PostController::class, 'destroy']);

//setting route
// Route::get('settings/logo',[SettingsController::class,'logoshow'])->name('logo.index');
// Route::put('settings-update',[SettingsController::class,'logoupdate'])->name('logo.update');
// Route::get('settings/banner',[SettingsController::class,'bannershow'])->name('banner.index');
// Route::put('settings-banner-update',[SettingsController::class,'bannerupdate'])->name('banner.update');
Route::get('settings/allsettings',[SettingsController::class,'allsettingsshow'])->name('setting.index');
Route::put('settings-update',[SettingsController::class,'settingupdate'])->name('setting.update');



//supplier and customer
Route::get('suppliercustomer',[SupplierCustomerController::class,'showcustomercategory'])->name('customer.category');
Route::post('customer-category-create', [SupplierCustomerController::class, 'store'])->name('customer.category.create');
Route::get('customer_category', [SupplierCustomerController::class, 'allcustomercateogry']);







