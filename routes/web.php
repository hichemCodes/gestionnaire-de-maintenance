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


//Route pour le guest
Route::get('/', function () {
    $resources = Resource::all();
    return view('welcome',['resources' => $resources]);
});
Route::get('/resources/codeQR/{id}', 'HomeController@generateQR')->name('codeQrGuest');
Route::get('/resources/anomalies/add/{id}', 'HomeController@addAnomalie')->name('add-anomalie-guest');
Route::post('/resources/anomalies/store/{id}', 'HomeController@saveAnomalie')->name('store-anomalie-guest');



Route::middleware('auth','role:admin')->group(function () {

    Route::get('/admin', 'AdminController@index')->name('admin-home');
    Route::delete('/admin/delete/resp/{id}', 'AdminController@destroy')->name('delete-responsable');
    Route::post('/admin/responsable/store', 'AdminController@create')->name('store-responsable');

    //Route::get('/',function () {return redirect('/admin');});
});

Route::middleware('auth','role:responsable')->group(function () {

    Route::get('/responsable/resources', 'ResponsableController@index')->name('resources');;
    Route::get('/responsable/resources/add', 'ResponsableController@addResource')->name('add-resource');
    Route::post('/responsable/resources/store', 'ResponsableController@storeResource')->name('store-resource');
    Route::get('/responsable/anomalies', 'ResponsableController@indexAnomalies')->name('anomalies');
    Route::get('/responsable/resources/rapport/{id}', 'ResponsableController@displayRapport')->name('rapport');;
    Route::get('/responsable/resources/codeQR/{id}', 'HomeController@generateQR')->name('codeQr');
    Route::get('/responsable/resources/anomalies/add/{id}', 'HomeController@addAnomalie')->name('add-anomalie');
    Route::post('/responsable/resources/anomalies/store/{id}', 'HomeController@saveAnomalie')->name('store-anomalie');
    Route::delete('/responsable/anomalies/close/{id}', 'ResponsableController@closeAnomalie')->name('close-anomalie');
    //Route::get('/',function () {return redirect('responsable/resources');});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
