<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Auth;
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

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/view/{slug}', 'pageDetail')->name('pageDetail');
    Route::get('/view/{slug}/detail', 'sectionDetail')->name('sectionDetail');
});




Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
            Route::get('/', [SliderController::class, 'index'])->name('index');
            Route::post('/', [SliderController::class, 'store'])->name('store');
            Route::get('/delete/{id}', [SliderController::class, 'destroy'])->name('destroy');
            Route::post('/update/{id}', [SliderController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
            Route::get('/', [PageController::class, 'index'])->name('index');
            Route::get('/create-page', [PageController::class, 'createForm'])->name('createForm');
            Route::post('/', [PageController::class, 'store'])->name('store');
            Route::get('/delete/{id}', [PageController::class, 'destroy'])->name('destroy');
            // Route::post('/update/{id}', [PageController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'sections', 'as' => 'sections.'], function () {
            Route::get('/', [SectionController::class, 'index'])->name('index');
            Route::get('/create-page', [SectionController::class, 'createForm'])->name('createForm');
            Route::post('/', [SectionController::class, 'store'])->name('store');
            Route::get('/delete/{id}', [SectionController::class, 'destroy'])->name('destroy');
            // Route::post('/update/{id}', [PageController::class, 'update'])->name('update');
        });
    });
});
