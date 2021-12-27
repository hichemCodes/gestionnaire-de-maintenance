<?php

use Illuminate\Support\Facades\Route;
use App\Resource;


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
    $resources = Resource::all();
    return view('welcome',['resources' => $resources]);
});

Route::middleware('auth','role:admin')->group(function () {
    Route::get('/admin', 'AdminController@index');
    Route::delete('/admin/delete/resp/{id}', 'AdminController@destroy')->name('delete-responsable');
});

Route::middleware('auth','role:responsable')->group(function () {
    Route::get('/responsable/resources', 'ResponsableController@index')->name('resources');;
    Route::get('/responsable/anomalies', 'ResponsableController@indexAnomalies')->name('anomalies');
    Route::get('/responsable/resources/rapport/{id}', 'HomeController@displayRapport')->name('rapport');;
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
