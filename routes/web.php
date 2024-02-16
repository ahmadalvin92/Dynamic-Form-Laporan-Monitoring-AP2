<?php

use App\Models\LaporanMonitoring;
use App\Models\Masterperangkat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\MasterperangkatController;
use App\Http\Controllers\LaporanMonitoringController;
use App\Http\Controllers\MonitoringPerangkatController;
use App\Http\Controllers\MonitoringChecklistController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PDFController;

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

//Route::get('/', function () {
//  return view('welcome');
//});
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/usermanagement', [AuthController::class, 'usermanagement']);
Route::put('/users/{id}/role', [AuthController::class, 'updateRole']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/starter', [KaryawanController::class, 'starter']);
Route::get('/about', [KaryawanController::class, 'about']);
Route::get('/contact', [KaryawanController::class, 'contact']);

Route::get('/home', [KaryawanController::class, 'index'])->name('home');
Route::get('/datakaryawan', [KaryawanController::class, 'datakaryawan']);
Route::get('/formkaryawan', [KaryawanController::class, 'formkaryawan']);
Route::get('/formkaryawan', [PerangkatController::class, 'formkaryawan']);
//Route::post('/addkaryawan', [KaryawanController::class, 'addkaryawan']);
//Route::delete('/deletekaryawan/{id}', [KaryawanController::class, 'deletekaryawan'])->name('deletekaryawan');
//Route::get('/editkaryawan/{id}', [KaryawanController::class, 'editkaryawan'])->name('editkaryawan');
//Route::put('/updatekaryawan/{id}', [KaryawanController::class, 'updatekaryawan'])->name('updatekaryawan');
//Route::get('/masterperangkat', [MasterperangkatController::class, 'index'])->name('masterperangkat');
//Route::post('/addperangkat', [MasterperangkatController::class, 'addPerangkat']);
//Route::get('/hapusperangkat/{id}', [MasterperangkatController::class, 'hapusPerangkat']);
Route::get('/masterperangkat', [MasterperangkatController::class, 'index']);
Route::post('/addMasterperangkat', [MasterperangkatController::class, 'addMasterperangkat']);
Route::post('/addMasterchecklist', [MasterperangkatController::class, 'addMasterchecklist']);
Route::get('/generatepdf', [MasterperangkatController::class, 'generatepdf']);
Route::get('/hapusperangkat/{id}', [MasterperangkatController::class, 'hapusperangkat'])->name('hapusperangkat');
Route::get('/hapuschecklist/{id}', [MasterperangkatController::class, 'hapuschecklist'])->name('hapuschecklist');

Route::get('/form-laporan-monitoring', [LaporanMonitoringController::class, 'index']);
Route::post('/add-laporan-monitoring', [LaporanMonitoringController::class, 'addLaporanMonitoring']);

Route::get('/form-monitoring-perangkat/{perangkat}', [MonitoringPerangkatController::class, 'index']);
Route::post('/add-monitoring-perangkat', [MonitoringPerangkatController::class, 'addMonitoringPerangkat']);

Route::get('/form-monitoring-checklist/{perangkat}/{idlaporanmonitoring}', [MonitoringChecklistController::class, 'index']);
Route::post('/add-monitoring-checklist', [MonitoringChecklistController::class, 'addMonitoringChecklist']);

Route::get('/laporanmonitoringdata', [LaporanMonitoringController::class, 'laporanmonitoringdata']);
Route::delete('/delete-laporanmonitoring/{id}', [LaporanMonitoringController::class, 'delete']);
Route::get('/laporanmonitoring-show/{id}', [LaporanMonitoringController::class, 'laporanmonitoring_show']);
Route::get('/laporanmonitoring-createpdf/{id}', [LaporanMonitoringController::class, 'laporanmonitoring_createpdf']);


