<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/all-user', [UserController::class, 'allUsers'])->name('allUsers');
Route::get('/add-user', [UserController::class, 'addUser'])->name('addUser');
Route::post('/create-user', [UserController::class, 'createUser'])->name('createUser');
Route::post('/update-user', [UserController::class, 'updateUser'])->name('updateUser');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
Route::get('/view-user/{id}', [UserController::class, 'viewUser'])->name('viewUser');

Route::get('/bands', [BandController::class, 'allBands'])->name('allBands');
Route::get('/view-band/{id}', [BandController::class, 'viewBand'])->name('viewBand');
Route::get('/add-band', [BandController::class, 'addBand'])->name('addBand');
Route::post('/create-band', [BandController::class, 'createBand'])->name('createBand');
Route::get('/delete-band/{id}', [BandController::class, 'deleteBand'])->name('deleteBand');
Route::post('/create-album', [BandController::class, 'createAlbum'])->name('createAlbum');
Route::get('/delete-album/{id}', [BandController::class, 'deleteAlbum'])->name('deleteAlbum');
Route::get('/view-album/{id}', [BandController::class, 'viewAlbum'])->name('viewAlbum');
Route::get('/add-album/{id}', [BandController::class, 'addAlbum'])->name('addAlbum');
