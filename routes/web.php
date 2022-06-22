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
    return view('index');
});

Auth::routes();



/*frontend*/
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);
/*backend*/
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    /*vacatures*/
    Route::resource('/vacatures',App\Http\Controllers\AdminVacaturesController::class);
    Route::get('vacature/restore/{vacature}', 'App\Http\Controllers\AdminvacatureController@restore')->name('vacatures.restore');
    /*bedrijven*/
   Route::resource('/bedrijven',App\Http\Controllers\AdminbedrijvenController::class);
    Route::get('bedrijf/restore/{bedrijf}', 'App\Http\Controllers\AdminbedrijvenController@restore')->name('bedrijven.restore');

    /*steden*/
    Route::resource('/steden',App\Http\Controllers\AdminStedenController::class);
    Route::get('city/restore/{city}', 'App\Http\Controllers\AdminstedenController@restore')->name('steden.restore');

});

