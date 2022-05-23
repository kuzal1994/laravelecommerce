<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Admin;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('frontend.index');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin routes
Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class, 'Adminprofile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class, 'Adminprofileedit'])->name('admin.profile.edit');
Route::post('/admin/profile/update',[AdminProfileController::class, 'Adminprofileupdate'])->name('admin.profile.update');
Route::get('/admin/change/password',[AdminProfileController::class, 'Adminchangepassword'])->name('admin.change.password');
Route::post('/admin/update/password',[AdminProfileController::class, 'Adminupdatepassword'])->name('admin.update.password');
Route::get('/admin/all/brand',[AdminProfileController::class, 'Adminchangepassword'])->name('all.brand');

//User routes
Route::get('/user/login',[UserController::class, 'login'])->name('user.login');
Route::get('/user/forgetpassword',[UserController::class, 'forgetpassword'])->name('user.forgetpassword');
Route::get('/user/logout',[UserController::class, 'logout'])->name('user.logout');
Route::get('/user/profile',[UserController::class, 'userprofile'])->name('user.profile');
Route::post('/user/profile/update',[UserController::class, 'userprofileupdate'])->name('user.profile.update');
Route::get('/user/change/password',[UserController::class, 'userchangepassword'])->name('user.change.password');
Route::post('/user/change/password/udate',[UserController::class, 'userchangepasswordupdate'])->name('user.password.update');

//Brand routes

Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class, 'brandview'])->name('all.brand');
    Route::post('/store',[BrandController::class, 'brandstore'])->name('brand.store');
    Route::get('/edit/{id}',[BrandController::class, 'brandedit'])->name('brand.edit');
    Route::post('/update',[BrandController::class, 'brandupdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class, 'branddelete'])->name('brand.delete');
    
});
//ADmin category routes
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class, 'categoryview'])->name('all.category');
    Route::post('/store',[CategoryController::class, 'categorystore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'categoryedit'])->name('category.edit');
    Route::post('/update',[CategoryController::class, 'categoryupdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class, 'categorydelete'])->name('category.delete');
    
});

//admin sub category routes

    Route::get('/sub/view',[SubCategoryController::class, 'allsubcategoryview'])->name('all.subcategory');
    Route::post('/sub/store',[SubCategoryController::class, 'subcategorystore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}',[SubCategoryController::class, 'subcategoryedit'])->name('subcategory.edit');
    Route::post('/sub/update',[SubCategoryController::class, 'subcategoryupdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}',[SubCategoryController::class, 'subcategorydelete'])->name('subcategory.delete');

    //sub-sub categories
Route::get('/sub/sub/view',[SubCategoryController::class, 'allsubsubcategoryview'])->name('all.subsubcategory');

    

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id=Auth::user()->id;
    $user=User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');
