<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RangkingController;

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

Route::get('/',[LoginController::class, 'login'])->name('login');
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

//admin

    // Dashboard
    Route::get('/dashboardadmin',[LoginController::class, 'dashboard'])->name('dashboard');

    // Data Karyawan
    Route::get('/employee',[EmployeeController::class, 'index'])->name('employee');
    Route::get('/createemployee',[EmployeeController::class, 'create'])->name('create');
    Route::post('/insertdataemployee',[EmployeeController::class, 'insertdata'])->name('insertdata');
    Route::get('/showemployee/{id}',[EmployeeController::class, 'show'])->name('show');
    Route::post('/updateemployee/{id}',[EmployeeController::class, 'update'])->name('update');
    Route::get('/deleteemployee/{id}',[EmployeeController::class, 'delete'])->name('delete');

    // Data Kriteria
    Route::get('/criteria',[CriteriaController::class, 'index'])->name('criteria');
    Route::get('/createcriteria',[CriteriaController::class, 'create'])->name('create');
    Route::post('/insertdatacriteria',[CriteriaController::class, 'insertdata']);
    Route::get('/showcriteria/{id}',[CriteriaController::class, 'show'])->name('show');
    Route::post('/updatecriteria/{id}',[CriteriaController::class, 'update'])->name('update');
    Route::get('/deletecriteria/{id}',[CriteriaController::class, 'delete'])->name('delete');


//employee
    Route::get('/dashboardemp',[LoginController::class, 'dashboardemp'])->name('dashboardemp');
    Route::get('/posisi',[LoginController::class, 'index'])->name('dashboardreal');

    Route::get('/hasilpenilaian',[PenilaianController::class, 'index'])->name('penilaian');
    Route::get('/formpenilaian',[PenilaianController::class, 'create'])->name('createpenilaian');

    Route::post('/insertpenilaian',[PenilaianController::class, 'insertdata']);
    Route::post('/insertpenilaian/{id}', [PenilaianController::class, 'savePenilaian'])->name('insertpenilaian');

    Route::get('/showpenilaian/{id}',[PenilaianController::class, 'show'])->name('show');
    Route::get('/deletepenilaian/{id}',[PenilaianController::class, 'delete'])->name('delete');


    // ON PRIORITY
    Route::get('/formpenilaian2/{id}',[PenilaianController::class, 'showForm'])->name('createpenilaian2');
    Route::post('/storepenilaian',[PenilaianController::class, 'store'])->name('storenilai');

    Route::post('/generateRanking',[RangkingController::class, 'generateRanking'])->name('generateRanking');
    Route::get('/ranking',[RangkingController::class, 'index'])->name('ranking');

    Route::get('/minimum-scores', [PenilaianController::class, 'showMinimumScores'])->name('minimum-scores');


 });
