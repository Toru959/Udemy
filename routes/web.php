<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;
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
Route::get('tests/test', [TestController::class, 'index']);

Route::resource('contacts', ContactFormController::class);

Route::prefix('contacts')->middleware(['auth'])
->controller(ContactFormController::class)
->name('contacts')
->group(function() {
    Route::get('contacs', [ContactFormController::class, 'index'])->name('contacts.index');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/* Route::get('/home', 'Homeontroller@index')->name(
    'home'
);*/

require __DIR__.'/auth.php';
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
