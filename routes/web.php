<?php

use Illuminate\Support\Facades\Route;

// Livewire components (class strings)
use App\Livewire\Dishes\Index as DishesIndex;
use App\Livewire\Batches\Index as BatchesIndex;
use App\Livewire\Batches\Edit as BatchesEdit;
use App\Livewire\Customers\Index as CustomersIndex;
use App\Livewire\Orders\Create as OrdersCreate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dishes', DishesIndex::class)->name('dishes.index');
Route::get('/batches', BatchesIndex::class)->name('batches.index');
Route::get('/batches/{batch}/edit', BatchesEdit::class)->name('batches.edit');
Route::get('/customers', CustomersIndex::class)->name('customers.index');
Route::get('/orders/create', OrdersCreate::class)->name('orders.create');
