<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// tiketing
Route::get('/tiketing/', [TiketingController::class, 'index']); 
Route::post('/tiketing/add/', [TiketingController::class, 'store']); 
Route::get('/tiketing/getById/{id}', [TiketingController::class, 'page_id'])->name('getById');
Route::get('/tiketing/create', [TiketingController::class, 'create'])->middleware('admin'); 
Route::get('/tiketing/{id}/edit', [TiketingController::class, 'edit'])->middleware('admin') ; 
Route::put('/tiketing/{id}', [TiketingController::class, 'update']) ; 
Route::delete('/tiketing/{id}', [TiketingController::class, 'delete'])->middleware('auth'); 


//payment cart
Route::get('/tiketing/cart', [PaymentController::class, 'cart'])->middleware('auth'); 
Route::post('/tiketing/add_to_cart', [PaymentController::class, 'add_to_cart'])->middleware('auth'); 
Route::get('/tiketing/payment/cek_checkout/{id}', [PaymentController::class, 'get_page_checkout'])->middleware('auth'); 
Route::post('/tiketing/cek_checkout/{id}', [PaymentController::class, 'cek_checkout'])->middleware('auth'); 
Route::get('/tiketing/checkout/{id}', [PaymentController::class, 'checkout'])->name('checkout')->middleware('auth'); 
Route::get('/tiketing/invoice/{id}', [PaymentController::class, 'invoice'])->middleware('auth'); 
Route::get('/tiketing/list_order', [PaymentController::class, 'list_order'])->middleware('auth'); 
Route::delete('/tiketing/cart/payment/{id}', [PaymentController::class, 'delete_cart'])->middleware('auth'); 


//admin
Route::get('/tiketing/admin/dashboard', [TiketingController::class, 'dashboard_admin']); 


//users
Route::get('/user/register', [UserController::class, 'register']);
Route::get('/user/register/admin', [UserController::class, 'register_admin']); 
Route::post('/user/register', [UserController::class, 'store']);
Route::get('/user/login', [UserController::class, 'login'])->name('login')->middleware('guest'); 
Route::post('/user/login', [UserController::class, 'authenticate']);
Route::post('/user/logout', [UserController::class, 'logout']);
Route::get('/user/profile/{id}', [UserController::class, 'profile'])->middleware('auth');
Route::put('/user/profile/{id}', [UserController::class, 'edit_profile'])->middleware('auth');



