<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/dashboard', function () {
//     return view('admin-dashboard');
// });

// Route::get('/', function () {
//     return view('page.login');
// });

//Auth::routes();
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//user
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/teknisi', [TeknisiController::class, 'index'])->name('teknisi');
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');

Route::group(['middleware'=>'admin'],function(){
    //Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
});
Route::group(['middleware'=>'teknisi'],function(){
    //Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
});

//data master users
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/add_user', [UserController::class, 'create'])->name('add_user');
Route::post('/user/store', [UserController::class, 'store'])->name('user_store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user_edit');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user_update');
Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user_destroy');

//data master teknisi
Route::get('/servis', [TeknisiController::class, 'show'])->name('teknisi');
Route::get('/add_servis', [TeknisiController::class, 'create'])->name('add_servis');
Route::post('/servis/store', [TeknisiController::class, 'store'])->name('servis_store');
Route::get('/sms', [TeknisiController::class, 'showsms'])->name('sms');
Route::post('/custom',  [TeknisiController::class,'sendCustomMessage']);

//data master customer

//ajax
Route::get('/search',  [CustomerController::class,'search']);
Route::get('/read',  [CustomerController::class,'read']);

//data master admin
Route::get('/laporan_servis', [AdminController::class, 'show'])->name('laporan_servis');
Route::get('/laporan_pemasukan', [AdminController::class, 'laporan_pemasukan'])->name('laporan_pemasukan');
Route::get('/laporan_pesan', [AdminController::class, 'laporan_pesan'])->name('laporan_pesan');

Route::get('/downloadpdf', [DashboardController::class, 'createPDF']);
Route::get('/downloadpdf_servis', [DashboardController::class, 'createPDF_servis']);
Route::get('/downloadpdf_pesan', [DashboardController::class, 'createPDF_pesan']);

