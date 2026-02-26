<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\VoteController;
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
    //return view('welcome');
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
   // return view('dashboard');
    if (Auth::user()->role === 'voter') {
        return redirect()->route('vote.index');
    }

    return app(ResultController::class)->index();
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/vote', [VoteController::class, 'index'])->name('vote.index');
    Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
    Route::get('/thankyou', [VoteController::class, 'thankyou'])->name('vote.thankyou');
});

/*
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    //Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    //Route::resource('candidates', App\Http\Controllers\Admin\CandidateController::class);
    Route::resource('candidates', CandidateController::class);
    Route::get('results', [ResultController::class, 'index'])->name('admin.results');
});
*/

Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('candidates', CandidateController::class);
    Route::get('results', [ResultController::class, 'index'])->name('results');
});



require __DIR__.'/auth.php';
