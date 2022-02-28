<?php

use App\Http\Controllers\ApprovisionnementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\RevenuController;
use App\Http\Controllers\SourceController;
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

/**
 * Show main page
 */
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/**
 * Show register page
 */
Route::get('/register', function () {
    return view('register');
});

/**
 * Save user
 */
Route::post('/register', [MainController::class, 'register'])->name('register');

/**
 * Login attempt
 */
Route::post('/login', [MainController::class, 'login'])->name('login');

/**
 * Dashboard routes
 */
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function (){
    Route::get('/', [DashboardController::class, 'main'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

    Route::group(['prefix'  =>  'mes-revenus'], function (){
        Route::get('/', [RevenuController::class, 'index'])->name('revenus');
        Route::get('/edit/{revenu}', [RevenuController::class, 'edit'])->name('revenus.edit');
        Route::post('/edit/{revenu}', [RevenuController::class, 'update'])->name('revenus.edit.post');
        Route::post('/', [RevenuController::class, 'store'])->name('revenus.post');
        Route::post('/delete', [RevenuController::class, 'delete'])->name('revenus.delete');
    });

    Route::group(['prefix'  =>  'mes-depenses'], function (){
        Route::get('/', [DepenseController::class, 'index'])->name('depenses');
        Route::post('/', [DepenseController::class, 'store'])->name('depenses.post');
        Route::post('/delete', [DepenseController::class, 'delete'])->name('depenses.delete');
    });

    Route::group(['prefix'  =>  'mes-approvisionnements'], function (){
        Route::get('/', [ApprovisionnementController::class, 'index'])->name('approvisionnements');
    });

    Route::resource('mes-sources', SourceController::class)->only(['index', 'store']);

    Route::group(['prefix'  =>  'mes-projets'], function (){
        Route::get('/', [ProjetController::class, 'projets'])->name('projets');
    });
});


