<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;


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
    return view('auth.login');
});
 
Route::group(['prefix' => 'auth'], function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerSave'])->name('register.save');
  
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginAction'])->name('login.action');
  
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

  
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
 
    Route::group(['prefix' => 'products'], function () {
        Route::get('', [ProductController::class, 'index'])->name('products');
        Route::get('create', [ProductController::class, 'create'])->name('products.create');
        Route::post('store', [ProductController::class, 'store'])->name('products.store');
        Route::get('show/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('edit/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    


    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
   // Route::get('/profile/{id}', [AuthController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::post('/profile/{id}', [AuthController::class, 'updateProfile'])->name('profile.updateProfile');

});


Route::get('/info', [DashboardController::class, 'index'])->name('info');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');



// Show the form to add a new category
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Store a new category
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Show the form to edit a category
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// Update a category
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

// Delete a category
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');



Route::resource('orders', OrderController::class);
Route::resource('customers', CustomerController::class);
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
//Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
// web.php
Route::get('/customers/{customerId}/orders', [CustomerController::class, 'showOrdersByCustomer'])->name('customers.showOrders');

// routes/web.php

//Route::get('/invoices/{order}/print', 'InvoiceController@print')->name('invoices.print');


// routes/web.php

//Route::get('/customers/{customerId}/invoice', 'CustomerController@generateInvoice')->name('customers.generateInvoice');



Route::get('/invoices/{order}/print', [InvoiceController::class, 'print'])->name('invoices.print');


// Add other routes as needed
