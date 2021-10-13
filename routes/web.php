<?php

use App\Models\Riddle;
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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', 'App\Http\Controllers\RiddleController@index')->name('map');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 });

require __DIR__.'/auth.php';
