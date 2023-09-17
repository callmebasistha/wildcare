<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [FrontendController::class, 'welcome'])->name('welcome');

// Route::get('/', function () {
//     return view('frontend.pages.landing');
// });
// Route::get('/', function () {
//     return view('backend.pages.landing');
// });

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
    });
});
