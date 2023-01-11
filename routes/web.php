<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SweepstakeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');
Route::post('/players/create', [PlayerController::class, 'store'])->name('players.store');
Route::delete('/players/{id}', [PlayerController::class, 'destroy'])->name('players.destroy');
Route::get('/player/edit/{id}', [PlayerController::class, 'edit'])->name('players.edit');
Route::put('/player/update/{id}', [PlayerController::class, 'update'])->name('players.update');

Route::get('/sweepstake', [SweepstakeController::class, 'index'])->name('sweepstake.index');
Route::post('/sweepstake/start', [SweepstakeController::class, 'startSweepstake'])->name('sweepstake.start');
