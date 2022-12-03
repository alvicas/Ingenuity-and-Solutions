<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::middleware('auth')->group(function () {
    Route::get('/library', function () {
        $authUser = Auth::user();
        return view('components\dashboard', ['authUserName' => $authUser->name]);
    });
 
});


Route::get('/login', function () {
    return view('components/auth/signIn');
})->name('login');

Route::get('/register', function () {
    return view('components/auth/signUp');
})->name('register');

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, '__invoke'])->name('auth.login');
    Route::post('/register', [RegisterController::class, '__invoke'])->name('auth.register');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('login');
    })->name('auth.logout');
});
