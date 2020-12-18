<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiodataUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UsersRegistrationController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\SuratPengunduranDiriController;
use App\Http\Controllers\SuratKeteranganCutiController;
use App\Http\Controllers\SuratKeteranganAktifSetelahCutiController;
use App\Http\Controllers\LegalisasiTranskripController;
use App\Http\Controllers\SuratKeteranganAktifController;
use App\Http\Controllers\SuratKeteranganLulusController;
use App\Http\Controllers\SuratPerpanjanganMasaStudiController;


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
//landing page
Route::get('/', function () {
    return view('welcome');
});
//Email Service
//Route::post('/send-email', 'MailController@sendEmail');
Route::post('/send-email',[MailController::class, 'sendEmail']);
//admin

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function (){
    Route::get('/dashboard', [AdminController::class, 'viewAdminDashboard'])->name('admin-dashboard');
    Route::get('/suratdiproses', [AdminController::class, 'viewSuratDiproses'])->name('admin-diproses');
    Route::get('/suratmasuk', [AdminController::class, 'viewSuratMasuk'])->name('admin-masuk');
    Route::get('/suratselesai', [AdminController::class, 'viewSuratSelesai'])->name('admin-selesai');
    Route::get('/suratditolak', [AdminController::class, 'viewSuratDitolak'])->name('admin-ditolak');
    Route::get('/createadmin', [AdminController::class, 'viewCreateAdmin'])->name('admin-create');

    Route::get('/login', [AdminController::class, 'viewLogin']);
    //Route::post('/login', 'App\Http\Controllers\AdminLoginController@postLogin')->name('admin-login');
    Route::post('/login', [AdminLoginController::class,'postLogin'])->name('admin-login');

    //surat detail
    Route::get('/surat-keterangan-aktif-detail/{id}', [AdminController::class, 'viewSuratKeteranganAktif'])->name('admin-suratketeranganaktif');
    Route::get('/surat-keterangan-aktif-detail/{id}/{request}', [SuratKeteranganAktifController::class, 'update'])->name('update-suratketeranganaktif');
    
    Route::get('/legalisir-detail/{id}', [AdminController::class, 'viewLegalisir'])->name('admin-legalisir');
    Route::get('/surat-keterangan-cuti-detail/{id}', [AdminController::class, 'viewSuratKeteranganCuti'])->name('admin-suratketerangancuti');
    Route::get('/surat-keterangan-aktif-setelah-cuti-detail/{id}', [AdminController::class, 'viewSuratKeteranganAktifSetelahCuti'])->name('admin-suratketeranganaktifsetelahcuti');
    Route::get('/surat-keterangan-lulus-detail/{id}', [AdminController::class, 'viewSuratKeteranganLulus'])->name('admin-suratketeranganlulus');
    Route::get('/surat-pengunduran-diri-detail/{id}', [AdminController::class, 'viewSuratPengunduranDiri'])->name('admin-suratpengundurandiri');
    Route::get('/surat-perpanjangan-masa-detail/{id}', [AdminController::class, 'viewSuratPerpanjanganMasa'])->name('admin-suratperpanjanganmasa');
    
    //surat diproses
    Route::get('/diproses-legalisir/{id}', [AdminController::class, 'viewDiprosesLegalisir'])->name('admin-diproseslegalisir');
    Route::get('/diproses-keterangan-aktif-setelah-cuti/{id}', [AdminController::class, 'viewDiprosesKeteranganAktifSetelahCuti'])->name('admin-diprosesketeranganaktifsetelahcuti');
    Route::get('/diproses-keterangan-aktif/{id}', [AdminController::class, 'viewDiprosesKeteranganAktif'])->name('admin-diprosesketeranganaktif');
    Route::get('/diproses-keterangan-cuti/{id}', [AdminController::class, 'viewDiprosesKeteranganCuti'])->name('admin-diprosesketerangancuti');
    Route::get('/diproses-keterangan-lulus/{id}', [AdminController::class, 'viewDiprosesKeteranganLulus'])->name('admin-diprosesketeranganlulus');
    Route::get('/diproses-pengunduran-diri/{id}', [AdminController::class, 'viewDiprosesPengunduranDiri'])->name('admin-diprosespengundurandiri');
    Route::get('/diproses-perpanjangan-masa/{id}', [AdminController::class, 'viewDiprosesPerpanjanganMasa'])->name('admin-diprosesperpanjanganmasa');
    
    //surat ditolak
    Route::get('/ditolak-legalisir/{id}', [AdminController::class, 'viewDitolakLegalisir'])->name('admin-ditolaklegalisir');
    Route::get('/ditolak-keterangan-aktif-setelah-cuti/{id}', [AdminController::class, 'viewDitolakKeteranganAktifSetelahCuti'])->name('admin-ditolakketeranganaktifsetelahcuti');
    Route::get('/ditolak-keterangan-aktif/{id}', [AdminController::class, 'viewDitolakKeteranganAktif'])->name('admin-ditolakketeranganaktif');
    Route::get('/ditolak-keterangan-cuti/{id}', [AdminController::class, 'viewDitolakKeteranganCuti'])->name('admin-ditolakketerangancuti');
    Route::get('/ditolak-keterangan-lulus/{id}', [AdminController::class, 'viewDitolakKeteranganLulus'])->name('admin-ditolakketeranganlulus');
    Route::get('/ditolak-pengunduran-diri/{id}', [AdminController::class, 'viewDitolakPengunduranDiri'])->name('admin-ditolakpengundurandiri');
    Route::get('/ditolak-perpanjangan-masa/{id}', [AdminController::class, 'viewDitolakPerpanjanganMasa'])->name('admin-ditolakperpanjanganmasa');
});
   
  
//admin
Route::get('/admin/login', [AdminController::class, 'viewLogin']);
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin-logout');
Route::post('/admin/login', [AdminLoginController::class,'postLogin'])->name('admin-login');
//user
Route::get('/login', [UserLoginController::class, 'getLogin']);
Route::post('/login', [UserLoginController::class, 'postLogin'])->name('user-login');

Route::get('/user/register', [UsersRegistrationController::class, 'create']);
Route::post('/user/register', [UsersRegistrationController::class, 'store'])->name('user-register');

Route::get('/logout', [UserLoginController::class, 'logout'])->name('user-logout');

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function (){
    Route::get('/dashboard', [UserController::class, 'viewDashboard'])->name('user-dashboard');

    Route::get('/biodata', [UserController::class,'viewBiodata'])->name('user-biodata');
    Route::get('/biodata/edit/{id}', [UserController::class, 'viewBiodataEdit'])->name('user-biodata-edit-view');
    Route::post('/biodata/edit', [BiodataUserController::class,'updateBiodata'])->name('user-biodata-update');
    
    Route::get('/surat/surat-keterangan-aktif', [UserController::class,'viewSuratKeteranganAktif'])->name('user-surat-keterangan-aktif');
    Route::post('/surat/surat-keterangan-aktif', [SuratKeteranganAktifController::class,'store'])->name('create-user-surat-keterangan-aktif');

    Route::get('/surat/surat-keterangan-lulus', [UserController::class,'viewSuratKeteranganLulus'])->name('user-surat-keterangan-lulus');
    Route::post('/surat/surat-keterangan-lulus', [SuratKeteranganLulusController::class,'store'])->name('create-user-surat-keterangan-lulus');

    Route::get('surat/surat-perpanjangan-masa-studi', [UserController::class,'viewSuratPerpanjanganMasaStudi'])->name('user-surat-perpanjangan-masa-studi');
    Route::post('surat/surat-perpanjangan-masa-studi', [SuratPerpanjanganMasaStudiController::class,'store'])->name('create-user-surat-perpanjangan-masa-studi');

    Route::get('surat/surat-pengunduran-diri', [UserController::class,'viewSuratPengunduranDiri'])->name('user-surat-pengunduran-diri');
    Route::post('surat/surat-pengunduran-diri', [SuratPengunduranDiriController::class,'store'])->name('create-user-surat-pengunduran-diri');
    
    Route::get('surat/surat-keterangan-cuti', [UserController::class, 'viewSuratKeteranganCuti'])->name('user-surat-keterangan-cuti');
    Route::post('surat/surat-keterangan-cuti', [SuratKeteranganCutiController::class, 'store'])->name('create-user-surat-keterangan-cuti');
    
    Route::get('surat/surat-keterangan-aktif-cuti', [UserController::class,'viewSuratKeteranganAktifCuti'])->name('user-surat-keterangan-aktif-cuti');
    Route::post('surat/surat-keterangan-aktif-cuti', [SuratKeteranganAktifSetelahCutiController::class,'store'])->name('create-user-surat-keterangan-aktif-cuti');

    Route::get('surat/legalisir-transkrip', [UserController::class,'viewLegalisirTranskrip'])->name('user-legalisir-transkrip');
    Route::post('surat/legalisir-transkrip', [LegalisasiTranskripController::class,'store'])->name('create-user-legalisir-transkrip');

    //view detail
    Route::get('surat/surat-keterangan-aktif-detail/{id}', [UserController::class,'viewSuratKeteranganAktifDetail'])->name('user-surat-keterangan-aktif-detail');
    Route::get('surat/surat-keterangan-lulus-detail/{id}', [UserController::class,'viewSuratKeteranganLulusDetail'])->name('user-surat-keterangan-lulus-detail');
    Route::get('surat/surat-perpanjangan-masa-studi-detail/{id}', [UserController::class,'viewSuratPerpanjanganMasaStudiDetail'])->name('user-surat-perpanjangan-masa-studi-detail');
    Route::get('surat/surat-pengunduran-diri-detail/{id}', [UserController::class,'viewSuratPengunduranDiriDetail'])->name('user-surat-pengunduran-diri-detail');
    Route::get('surat/surat-keterangan-cuti-detail/{id}', [UserController::class, 'viewSuratKeteranganCutiDetail'])->name('user-surat-keterangan-cuti-detail');
    Route::get('surat/surat-keterangan-aktif-cuti-detail/{id}', [UserController::class,'viewSuratKeteranganAktifCutiDetail'])->name('user-surat-keterangan-aktif-cuti-detail');
    Route::get('surat/legalisir-transkrip-detail/{id}', [UserController::class,'viewLegalisirTranskripDetail'])->name('user-legalisir-transkrip-detail');
});