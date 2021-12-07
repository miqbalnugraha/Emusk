<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\InputDataController;
use App\Http\Controllers\KeteranganController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\SaranaSudahController;
use App\Http\Controllers\SaranaBelumController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Artisan;

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
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/',[HomeController::class,'index'] );
Route::get('/datatable',[HomeController::class,'datatables'])->name('table.sarana');
Route::get('/logout',[HomeController::class,'logout'] );

//monitoring
Route::get('/SaranaSudahDiuji', [SaranaSudahController::class, 'index'])->name('index.sudahDiuji');
Route::get('/SaranaSudahDiuji/lulus', [SaranaSudahController::class, 'lulus'])->name('lulus.sudahDiuji');
Route::get('/SaranaSudahDiuji/tidak-lulus', [SaranaSudahController::class, 'tidakLulus'])->name('tidak.sudahDiuji');

Route::get('/SaranaBelumDiuji', [SaranaBelumController::class, 'index'])->name('index.belumDiuji');
Route::get('/SaranaBelumDiuji/pending', [SaranaBelumController::class, 'pending'])->name('pending.belumDiuji');
Route::get('/SaranaBelumDiuji/belum-diuji', [SaranaBelumController::class, 'belum'])->name('belum.belumDiuji');

//keterangan
Route::get('/Keterangan', [KeteranganController::class, 'index']);

Route::get('/exportAll', [HomeController::class, 'exportAll'])->name('exportAll');

//excel
Route::get('/Excel', [ExcelController::class, 'index'])->name('excel');
Route::get('/Excel/downloadSudah/{id}', [ExcelController::class, 'downloadSudah'])->name('excel.downloadSudah'); 
    Route::get('/Excel/downloadBelum/{id}', [ExcelController::class, 'downloadBelum'])->name('excel.downloadBelum'); 
    Route::get('/Excel/downloadPending/{id}', [ExcelController::class, 'downloadPending'])->name('excel.downloadPending');    
    Route::get('/Excel/downloadOlah1/{id}', [ExcelController::class, 'downloadOlah1'])->name('excel.downloadOlah1'); 
    Route::get('/Excel/downloadOlah2/{id}', [ExcelController::class, 'downloadOlah2'])->name('excel.downloadOlah2'); 
//artisan
    Route::get('/config-cache', function() {
        $exitCode = Artisan::call('config:cache');
        return 'DONE'; //Return anything
    });
    Route::get('/clear-cache', function() {
        $exitCode = Artisan::call('cache:clear');
        return 'DONE'; //Return anything
    });
    Route::get('/migrate', function() {
        $exitCode = Artisan::call('migrate');
        return 'DONE'; //Return anything
    });
    Route::get('/migrate-fresh', function() {
        $exitCode = Artisan::call('migrate:fresh');
        return 'DONE'; //Return anything
    });
    Route::get('/db-seed', function() {
        $exitCode = Artisan::call('db:seed');
        return 'DONE'; //Return anything
    });


Route::middleware(['checkRole:master'])->group(function () {
    Route::get('/masterData',[MasterController::class,'index'] )->name('master.index');
    Route::post('/masterData/sarana/store',[MasterController::class,'storeSarana'] );
    Route::get('/masterData/sarana/create',[MasterController::class,'createSarana'] );
    Route::get('/masterData/sarana/edit/{id_sarana}',[MasterController::class,'editSarana'] );
    Route::post('/masterData/sarana/update/{id_sarana}',[MasterController::class,'updateSarana'] );
    Route::get('/masterData/sarana/inactivate/{id_sarana}',[MasterController::class,'inActivateSarana'] )->name('inActivate.sarana');
    Route::get('/masterData/sarana/activate/{id_sarana}',[MasterController::class,'activateSarana'] )->name('activate.sarana');

    Route::post('/masterData/operator/store',[MasterController::class,'storeOperator'] )->name('store.operator');
    Route::post('/masterData/operator/update/{id_operator}',[MasterController::class,'updateOperator'] )->name('update.operator');
    Route::get('/masterData/operator/inactivate/{id_operator}',[MasterController::class,'inActivateOperator'] )->name('inActivate.operator');
    Route::get('/masterData/operator/activate/{id_operator}',[MasterController::class,'activateOperator'] )->name('activate.operator');

    Route::post('/masterData/lokasi/store',[MasterController::class,'storeLokasi'] )->name('store.lokasi');
    Route::post('/masterData/lokasi/update/{id_lokasi}',[MasterController::class,'updateLokasi'] )->name('update.lokasi');
    Route::get('/masterData/lokasi/inactivate/{id_lokasi}',[MasterController::class,'inActivateLokasi'] )->name('inActivate.lokasi');
    Route::get('/masterData/lokasi/activate/{id_lokasi}',[MasterController::class,'activateLokasi'] )->name('activate.lokasi');

    Route::post('/masterData/ket/store',[MasterController::class,'storeKeterangan'] )->name('store.ket');
    Route::post('/masterData/ket/update/{id_keterangan}',[MasterController::class,'updateKeterangan'] )->name('update.ket');
    Route::get('/masterData/ket/inactivate/{id_keterangan}',[MasterController::class,'inActivateKeterangan'] )->name('inActivate.ket');
    Route::get('/masterData/ket/activate/{id_keterangan}',[MasterController::class,'activateKeterangan'] )->name('activate.ket');

    Route::post('/masterData/update/target/{id}',[MasterController::class,'updateTarget'] )->name('update.target');
    Route::get('/masterData/truncate',[MasterController::class,'truncate'] )->name('truncate')->middleware('password.confirm');

    Route::get('/userData',[UserDataController::class,'index'] )->name('user.index');
    Route::post('/userData/store',[UserDataController::class,'store'] )->name('user.store');
    Route::post('/userData/update/{id}',[UserDataController::class,'update'] )->name('user.update');
    Route::post('/userData/password/{id}',[UserDataController::class,'updatePassword'] )->name('user.password');

    Route::post('/Excel/updateSudah/{id}', [ExcelController::class, 'updateSudah'])->name('excel.updateSudah'); 
    Route::post('/Excel/updateBelum/{id}', [ExcelController::class, 'updateBelum'])->name('excel.updateBelum'); 
    Route::post('/Excel/updatePending/{id}', [ExcelController::class, 'updatePending'])->name('excel.updatePending');
    Route::post('/Excel/updateOlah1/{id}', [ExcelController::class, 'updateOlah1'])->name('excel.updateOlah1'); 
    Route::post('/Excel/updateOlah2/{id}', [ExcelController::class, 'updateOlah2'])->name('excel.updateOlah2');        
    
    Route::post('/inputData/import', [InputDataController::class,'import'])->name('import');
    Route::get('/inputData/format', [InputDataController::class,'format'])->name('format.import'); 
    
    Route::get('/masterDashboard', [MasterController::class,'dashboard']);   
});

Route::middleware(['checkRole:master,admin'])->group(function () {
    Route::get('/inputData',[InputDataController::class,'index'])->name('inputData.index');
    Route::get('/inputData/create',[InputDataController::class,'create']);
    Route::post('/inputData/create/store',[InputDataController::class,'store'])->name('data.store');
    Route::post('/inputData/edit',[InputDataController::class,'edit'])->name('edits');
    Route::post('/inputData/update',[InputDataController::class,'update'])->name('updates');
    Route::post('/inputData/delete',[InputDataController::class,'delete'])->name('delete.ujiSarana');
    Route::post('/inputData/destroy',[InputDataController::class,'destroy'])->name('destroy');
});

