<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailTemplateController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email-templates', [App\Http\Controllers\EmailTemplateController::class, 'index']);

Route::get('/email-templates/create', [App\Http\Controllers\EmailTemplateController::class, 'create']);
Route::post('/email-templates', [App\Http\Controllers\EmailTemplateController::class, 'store']);
Route::get('/email-templates/{emailTemplate}', [App\Http\Controllers\EmailTemplateController::class, 'show']);
Route::get('/email-templates/{emailTemplate}/edit', [App\Http\Controllers\EmailTemplateController::class, 'edit']);
Route::patch('/email-templates/{emailTemplate}', [App\Http\Controllers\EmailTemplateController::class, 'update']);
Route::delete('/email-templates/{emailTemplate}', [App\Http\Controllers\EmailTemplateController::class, 'destroy']);

Route::get('/email', [App\Http\Controllers\EmailTemplateController::class, 'email']);
Route::post('/send-email', [App\Http\Controllers\EmailTemplateController::class, 'sendMail']);

Route::get('/logout', function () {
    // log the user out
    auth()->logout();

    // redirect to the login page
    return view('auth.login');
});



