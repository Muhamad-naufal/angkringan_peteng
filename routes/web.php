<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Models\Makanan;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\MakananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/makanan', function () {
    $data = Makanan::all(); // Mendapatkan data dari model Makanan
    return view('makanan', compact('data'));
})->name('makanan');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/order/receipt/{orderId}', [OrderController::class, 'receipt'])->name('order.receipt');

Route::group(
    [
        'prefix' => config('admin.path'),
        'namespace' => 'App\\Http\\Controllers',
    ],
    function () {
        Route::get('login', 'LoginAdminController@formLogin')->name('admin.login');
        Route::post('login', 'LoginAdminController@login');

        Route::group(['middleware' => 'auth:admin'], function () {

            Route::post('/makanan', [MakananController::class, 'store'])->name('makanan.store');
            Route::put('/makanan/{makanan}', [MakananController::class, 'update'])->name('makanan.update');
            Route::get('/makanan/create', [MakananController::class, 'create'])->name('makanan.create');
            Route::get('/makanan', [MakananController::class, 'index'])->name('makanan.index');
            Route::get('/makanan/{makanan}/edit', [MakananController::class, 'edit'])->name('makanan.edit');
            Route::delete('/makanan/{makanan}', [MakananController::class, 'destroy'])->name('makanan.destroy');
            Route::post('logout', 'LoginAdminController@logout')->name('admin.logout');
            Route::view('/', 'dashboard')->name('dashboard');
            Route::get('/akun', 'AdminController@akun')->name('admin.akun');
            Route::put('/akun', 'AdminController@updateAkun');
            Route::put('/orders/reset', 'OrderController@reset')->name('orders.reset');
            Route::get('/order', [OrderController::class, 'index'])->name('order.index');
            Route::put('/orders/{order}', [OrderController::class, 'update'])->name('order.update');
            Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
            Route::group(['middleware' => ['can:role,"admin"']], function () {
                Route::resource('admin', 'AdminController');
            });
        });
    }
);
