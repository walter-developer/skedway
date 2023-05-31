<?php

use App\Http\Controllers\EventController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::prefix('/')->group(function () {
    //
    //
    Route::get('/', fn () => redirect(route('calendar.calendar.get')))->name('welcome');
    //
    //
    Route::prefix('/calendar/')->group(function () {
        //
        //
        Route::get('/', [EventController::class, 'calendar'])->name('calendar.calendar.get');
        //
        //
        Route::post('/data/', [EventController::class, 'data'])->name('calendar.data.post');
        //
        //
    });
    //
    //
    Route::prefix('/events/')->group(function () {
        //
        //
        Route::get('/{event?}', [EventController::class, 'events'])->name('events.event.get');
        //
        //
        Route::post('/', [EventController::class, 'create'])->name('events.event.post');
        //
        //
        Route::put('/', [EventController::class, 'update'])->name('events.event.put');
        //
        //
        Route::get('/delete/{event}', [EventController::class, 'delete'])->name('events.event.delete.get');
        //
        //
    });
    //
    //
});
