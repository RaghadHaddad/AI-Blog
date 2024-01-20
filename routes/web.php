<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\AdminsController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**start Author Route */
Route::resource('Author', AuthorsController::class);
/**end Author Route */

/**start category Route */
Route::resource('category', CategoryController::class);

/**end category Route */

/**start contact_PAGE Route */
Route::resource('Message', ContactsController::class);
Route::resource('answer',AnswerController::class);
Route::resource('Opinion', OpinionController::class);
Route::resource('Admin', AdminsController::class);
/**end contact_PAGE Route */
