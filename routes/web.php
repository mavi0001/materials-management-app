<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaintenanceToolController;
use App\Http\Controllers\EquipementAudiovisuelController;
use App\Http\Controllers\ItComputerEquipmentController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('maintenance-tools', MaintenanceToolController::class)
    ->middleware(['auth']);

Route::resource('equipement-audiovisuels', EquipementAudiovisuelController::class);

Route::resource('it-computer-equipments', ItComputerEquipmentController::class);




require __DIR__.'/auth.php';
