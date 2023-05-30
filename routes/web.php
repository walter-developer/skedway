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
    Route::get('/', fn () => redirect(route('events.calendar.get')));
    //
    //
    Route::prefix('/events/')->group(function () {
        //
        //
        Route::get('/{event?}', [EventController::class, 'events'])->name('events.events.get');
        //
        //
        Route::post('/', [EventController::class, 'events'])->name('events.events.post');
        //
        //
        Route::put('/', [EventController::class, 'events'])->name('events.events.put');
        //
        //
        Route::delete('/', [EventController::class, 'events'])->name('events.events.delete');
        //
        //
        Route::get('/calendar/', [EventController::class, 'calendar'])->name('events.calendar.get');
        //
        //
        Route::post('/data/', [EventController::class, 'data'])->name('events.data.post');
        //
        //
    });
    //
    //
});
