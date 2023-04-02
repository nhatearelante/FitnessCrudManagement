<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TrainingController;

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
    return view('index');
});

Route::get('index', function () {
    return view('index');
})->name('index');


// Route::get('/members', function () {
//     return view('members.index')->with('layout', 'components.layout');
// });

// Route::get('/trainers', function () {
//     return view('trainers.index')->with('layout', 'components.layout');
// });


Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/{id}', [MemberController::class, 'show'])->name('members.show');
Route::get('/members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/{id}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('members.destroy');


// Trainer
Route::get('/trainers', [TrainerController::class, 'index'])->name('trainers.index');
Route::get('/trainers/create', [TrainerController::class, 'create'])->name('trainers.create');
Route::post('/trainers', [TrainerController::class, 'store'])->name('trainers.store');
Route::get('/trainers/{id}', [TrainerController::class, 'show'])->name('trainers.show');
Route::get('/trainers/{id}/edit', [TrainerController::class, 'edit'])->name('trainers.edit');
Route::put('/trainers/{id}', [TrainerController::class, 'update'])->name('trainers.update');
Route::delete('/trainers/{id}', [TrainerController::class, 'destroy'])->name('trainers.destroy');

// Training
Route::get('/trainings', [TrainingController::class, 'index'])->name('trainings.index');
Route::get('/trainings/create', [TrainingController::class, 'create'])->name('trainings.create');
Route::post('/trainings', [TrainingController::class, 'store'])->name('trainings.store');
Route::get('/trainings/{id}', [TrainingController::class, 'show'])->name('trainings.show');
Route::get('/trainings/{id}/edit', [TrainingController::class, 'edit'])->name('trainings.edit');
Route::put('/trainings/{id}', [TrainingController::class, 'update'])->name('trainings.update');
Route::delete('/trainings/{id}', [TrainingController::class, 'destroy'])->name('trainings.destroy');

// Booking
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

// Payment
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payments.show');
Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');

// Route::resource('members', MemberController::class);
// Route::resource('trainers', TrainerController::class);
// Route::resource('trainings', TrainingController::class);
// Route::resource('bookings', BookingController::class);
// Route::resource('payments', PaymentController::class);
