<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
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


//View rouets
Route::get('/', [UserController::class, 'getSignInView']);
Route::get('/sign-up', [UserController::class, 'getSignUpView']);
Route::get('/phonebook',[ContactController::class, 'getPhonebook'])->name('phonebook');

//User Authentication rountes

Route::post('/signup',[UserController::class, 'postSignUp']);
Route::post('/signin',[UserController::class, 'postSignIn']);

Route::post('/create-contact',[ContactController::class,  'createContact']);
