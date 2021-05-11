<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBTableController;
use App\Http\Controllers\QueriesController;

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
});

Route::get('dbtable/{name}', [DBTableController::class, 'display']);

Route::get('query/orders-by-customer/{id}', [QueriesController::class, 'getOrdersByCustomer']);
Route::get('query/amounts-for-customers', [QueriesController::class, 'getAmountsForCustomers']);
Route::get('query/amounts-for-customers-json', [QueriesController::class, 'getAmountsForCustomersJSON']);
Route::get('query/paid-orders', [QueriesController::class, 'getPaidOrders']);

