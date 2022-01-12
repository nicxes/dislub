<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SettingsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [Controller::class, 'routes'])
    ->name('route information')
    ->withoutMiddleware('api');

// Authentication
Route::get('/login', [Controller::class, 'auth'])->name('login')->name('proper login redirect');
Route::get('redirect/{provider}', [AuthController::class, 'redirect'])->name('redirect to provider');
Route::get('callback/{provider}', [AuthController::class, 'callback'])->name('provider callback');
Route::get('onetap/{credential}', [AuthController::class, 'onetap'])->name('onetap support');
Route::post('attempt', [AuthController::class, 'attempt'])->name('email login attempt');
Route::post('login', [AuthController::class, 'login'])->name('attempt to start session');
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('remove session');
Route::get('me', [AuthController::class, 'me'])->middleware('auth:api')->name('get logged in user');

/*
 Application
*/

// Categories
Route::get('/categories', [CategoriesController::class, 'index'])->name('getting the categories list');
Route::get('/categories/{id}', [CategoriesController::class, 'find'])->name('getting category by id');
Route::post('/categories', [CategoriesController::class, 'store'])->name('create a new category');
Route::put('/categories/{id}', [CategoriesController::class, 'update'])->name('update an category');
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('destroy a category');

// Organizations
Route::get('/organizations', [OrganizationsController::class, 'index'])->name('getting organizations list');
Route::get('/organizations/orders', [OrganizationsController::class, 'orders'])->name('getting organizations list with orders');
Route::get('/organizations/orders/{id}', [OrganizationsController::class, 'findOrders'])->name('getting organizations list with orders');
Route::get('/organizations/{id}', [OrganizationsController::class, 'find'])->name('getting organization by id');
Route::get('/organizations/auth/{pin}', [OrganizationsController::class, 'login'])->name('getting organization by pin');
Route::get('/organizations/verify/{pin}', [OrganizationsController::class, 'checks'])->name('verify the pin if is exists');
Route::post('/organizations', [OrganizationsController::class, 'store'])->name('create a new organization');
Route::put('/organizations/{id}', [OrganizationsController::class, 'update'])->name('update an organization');
Route::delete('/organizations/{id}', [OrganizationsController::class, 'destroy'])->name('destroy a organization');

// Products
Route::get('/products', [ProductsController::class, 'index'])->name('getting the product list');
Route::get('/products/{id}', [ProductsController::class, 'find'])->name('getting product by id');
Route::post('/products', [ProductsController::class, 'store'])->name('create a new product');
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('update an product');
Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('destroy a product');

// Orders
Route::get('/orders', [OrdersController::class, 'index'])->name('getting the orders list');
Route::get('/orders/{id}', [OrdersController::class, 'find'])->name('getting order by id');
Route::post('/orders', [OrdersController::class, 'store'])->name('create a new orders');
Route::put('/orders/{id}', [OrdersController::class, 'update'])->name('update an orders');
Route::delete('/orders/{id}', [OrdersController::class, 'destroy'])->name('destroy a orders');

// Settings
Route::get('/settings', [SettingsController::class, 'index'])->name('getting the settings data');
Route::put('/settings', [SettingsController::class, 'update'])->name('update the settings data');