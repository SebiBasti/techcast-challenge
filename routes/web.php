<?php

use App\Http\Controllers\SingleEventController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
  return Inertia::render('Home');
});

Route::get('/dashboard', function () {
  return Inertia::render('Dashboard');
})
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::resource('single-events', SingleEventController::class)->only([
  'index',
  'store',
]);

Route::resource('conferences', ConferenceController::class)->only([
  'index',
  'store',
]);

Route::resource('presentations', PresentationController::class)->only([
  'index',
  'store',
]);

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name(
    'profile.edit'
  );
  Route::patch('/profile', [ProfileController::class, 'update'])->name(
    'profile.update'
  );
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
    'profile.destroy'
  );
});

require __DIR__ . '/auth.php';
