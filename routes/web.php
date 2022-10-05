<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [SchoolController::class, 'index']);
Route::post('/add_school', [SchoolController::class, 'store']);
Route::post('/delete', [SchoolController::class, 'delete']);
Route::post('/edit', [SchoolController::class, 'edit']);
Route::post('/update', [SchoolController::class, 'update']);