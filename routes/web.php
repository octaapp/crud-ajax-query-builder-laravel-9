<?php

use Illuminate\Support\Facades\Route;

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
    return view('_adminlayout.V_main');
});

use App\Http\Controllers\C_mahasiswa;
Route::controller(C_mahasiswa::class)->group(function () {
	Route::get('/mahasiswa', 'index')->name('page-crud-mahasiswa');
	Route::post('/list-data', 'list_data')->name('datatables-list');
	Route::post('/save-data-mahasiswa', 'store_ByArray')->name('save-data-mahasiswa-ajax');
	Route::get('/get-data-mahasiswa/{id?}', 'get_EditData')->name('get-data-mahasiswa-ajax');
	Route::post('/update-data-mahasiswa', 'update_ByArray')->name('update-data-mahasiswa-ajax');
	Route::get('/get-delete-data-mahasiswa/{id?}', 'get_DeleteData')->name('get-delete-data-mahasiswa-ajax');
	Route::delete('/delete-data-mahasiswa/{id?}', 'destroy')->name('delete-data-mahasiswa-ajax');
});