<?php
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ActivityController;

use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[WelcomeController::class,'welcome'])->name('welcome');

Route::controller(ContactController::class)->name('contacts.')->group(function ()
{
    Route::get('/contacts', 'index')->name('index');
    Route::get('/contacts/create', 'create')->name('create');
    Route::get('/contacts/{id}', 'show')->name('show');
});

Route::resource('/companies', \App\Http\Controllers\CompanyController::class);

Route::resources([
    '/tags' =>TagController::class,
    '/tasks' => TaskController::class
]);

/*Route::resource('/activities', \App\Http\Controllers\ActivityController::class)->names(
    [
        'index' => 'activities.all',
        'show' => 'activities.view'
    ]
);*/
Route::resource('/activities', \App\Http\Controllers\ActivityController::class)->parameters(
    [
        'activities' => 'active'
    ]
);

Route::resource('/contacts.notes',\App\Http\Controllers\ContactNoteController::class)->shallow();

Route::fallback(function () {
    return "Sorry, this page does not exist";
});
