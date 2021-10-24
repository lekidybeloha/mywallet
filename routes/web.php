<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
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
    return view('welcome');
})->name('welcome');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [MainController::class, 'register'])->name('register');
Route::post('/login', [MainController::class, 'login'])->name('login');

/**
 * Dashboard routes
 */
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function (){
    Route::get('/', [DashboardController::class, 'main'])->name('dashboard');
    Route::get('/mes-revenus', [DashboardController::class, 'revenus'])->name('revenus');
    Route::post('/mes-revenus', [DashboardController::class, 'revenusSave'])->name('revenus.post');
    Route::get('/mes-dépenses', [DashboardController::class, 'depenses'])->name('depenses');
    Route::get('/mes-approvisionnements', [DashboardController::class, 'approvisionnements'])->name('approvisionnements');
    Route::get('/mes-sources', [DashboardController::class, 'sources'])->name('sources');
    Route::post('/mes-sources', [DashboardController::class, 'sourcesSave'])->name('sources.post');
    Route::get('/mes-projets', [DashboardController::class, 'projets'])->name('projets');
});


