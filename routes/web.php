<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('home');

Route::get('/projects', fn () => redirect('/#projects'))->name('projects');

Route::view('/cisco-networking-academy', 'portfolio.cisco-networking-academy')->name('credentials.cisco');

Route::get('/repositories', [GitHubController::class, 'index'])->name('repositories');

Route::get('/img/{file}', function (string $file) {
    $path = public_path('img/' . basename($file));

    abort_unless(is_file($path), 404);

    return response()->file($path, [
        'Cache-Control' => 'public, max-age=604800',
    ]);
})->where('file', '[^/]+');

Route::get('/files/{file}', function (string $file) {
    $path = public_path('files/' . basename($file));

    abort_unless(is_file($path), 404);

    return response()->file($path, [
        'Cache-Control' => 'public, max-age=604800',
    ]);
})->where('file', '[^/]+');

Route::get('/designs', fn () => view('portfolio.designs'))->name('designs');
Route::view('/design/aurora', 'portfolio.variants.aurora')->name('design.aurora');
Route::view('/design/terminal', 'portfolio.variants.terminal')->name('design.terminal');
Route::view('/design/editorial', 'portfolio.variants.editorial')->name('design.editorial');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
