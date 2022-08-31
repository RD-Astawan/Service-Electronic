<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
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
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//user
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/teknisi', [TeknisiController::class, 'index'])->name('teknisi');
Route::get('/', [LoginController::class, 'show_dashboard_user']);

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
Route::get('/servis/edit/{id_servis}', [TeknisiController::class, 'edit'])->name('servis_edit');
Route::post('/servis/update/{id}', [TeknisiController::class, 'update'])->name('servis_update');
Route::get('/servis/destroy/{id_servis}', [TeknisiController::class, 'destroy'])->name('servis_destroy');
Route::get('/selectForm/{id_user}', [TeknisiController::class, 'selectForm']);

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

//Laporan
Route::get('/cetak_lap_servis', [LaporanController::class, 'laporan_servis'])->name('cetak_lap_servis');
Route::get('/cetak_lap_pemasukan', [LaporanController::class, 'laporan_pemasukan'])->name('cetak_lap_pemasukan');
Route::get('/cetak_lap_sms', [LaporanController::class, 'laporan_sms'])->name('cetak_lap_sms');

//Manajement Dashboard User/Customer
Route::get('/show_beranda', [DashboardController::class, 'show_beranda'])->name('show_beranda');
Route::get('/add_beranda', [DashboardController::class, 'add_beranda'])->name('add_beranda');
Route::post('/save_beranda', [DashboardController::class, 'save_beranda'])->name('save_beranda');
Route::get('/beranda/edit/{id_beranda}', [DashboardController::class, 'show_edit_beranda'])->name('show_edit_beranda');
Route::post('/beranda/update/{id_beranda}', [DashboardController::class, 'edit_beranda'])->name('update_beranda');
Route::get('/beranda/destroy/{id_beranda}', [DashboardController::class, 'destroy_beranda'])->name('hapus_beranda');
//Manajement Profile
Route::get('/show_profile', [DashboardController::class, 'show_profile'])->name('show_profile');
Route::get('/add_profile', [DashboardController::class, 'add_profile'])->name('add_profile');
Route::post('/save_profile', [DashboardController::class, 'save_profile'])->name('save_profile');
Route::get('/profile/edit/{id_profile}', [DashboardController::class, 'show_edit_profile'])->name('show_edit_profile');
Route::post('/profile/update/{id_profile}', [DashboardController::class, 'edit_profile'])->name('update_profile');
Route::get('/profile/destroy/{id_profile}', [DashboardController::class, 'destroy_profile'])->name('hapus_profile');
//Manajement Tips Perawatan
Route::get('/show_tips', [DashboardController::class, 'show_tips'])->name('show_tips');
Route::get('/add_tips', [DashboardController::class, 'add_tips'])->name('add_tips');
Route::post('/save_tips', [DashboardController::class, 'save_tips'])->name('save_tips');
Route::get('/tips/edit/{id_tips}', [DashboardController::class, 'show_edit_tips'])->name('show_edit_tips');
Route::post('/tips/update/{id_tips}', [DashboardController::class, 'edit_tips'])->name('update_tips');
Route::get('/tips/destroy/{id_tips}', [DashboardController::class, 'destroy_tips'])->name('hapus_tips');


