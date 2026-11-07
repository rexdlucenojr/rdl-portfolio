<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index']);

Route::get('/designs', fn () => view('portfolio.designs'))->name('designs');
Route::view('/design/aurora', 'portfolio.variants.aurora')->name('design.aurora');
Route::view('/design/terminal', 'portfolio.variants.terminal')->name('design.terminal');
Route::view('/design/editorial', 'portfolio.variants.editorial')->name('design.editorial');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
