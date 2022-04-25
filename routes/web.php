<?php

use App\Http\Controllers\MoviesController;
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
Route::get('/', [MoviesController::class, 'index']);
Route::get('/movie/{movie}', [MoviesController::class, 'show']);



// Route::get('/movies', function () {
//     return view('movies');
// });