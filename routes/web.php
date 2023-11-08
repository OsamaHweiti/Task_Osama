<?php

use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Route;
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

//HOME ROUTES
Route::get('/', function () {
    return view('home.index');
});
Route::get('/', [BlogsController::class, 'homepage']); 

Route::get('/about', function () {
    return view('home.about');
})->name('aboutpage');

Route::get('/blog/{id}', [BlogsController::class, 'showblog'])->name('showblog'); 



// AUTH ROUTES 
Route::get('/login', function () {
    return view('Auth.login');
});
Route::get('/logout', [UserController::class, 'logout'])->name('logout'); 

Route::post('post-login', [UserController::class, 'Login'])->name('Login'); 

Route::get('/register', function () {
    return view('Auth.register');
});
Route::post('post-register', [UserController::class, 'register'])->name('register'); 
//END OF AUTH ROUTES

//DASHBOARD ROUTES 

Route::resource('/dashboard', BlogsController::class);
Route::get('dashboard/{id}/edit/',[BlogsController::class,'edit']);
Route::get('dashboard/{id}/show/',[BlogsController::class,'show']);
Route::post('dashboard/{id}', [BlogsController::class, 'destroy']);
