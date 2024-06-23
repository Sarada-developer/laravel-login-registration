<?php
use App\Http\Controllers\RegistrationController;

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
Route:: get('/register',[RegistrationController::class,'register']);
Route:: post('/getCity',[RegistrationController::class,'getCity']);
Route:: post('/insertUser',[RegistrationController::class,'insert'])->name('insertUser');
Route:: get('/login',[RegistrationController::class,'login'])->name('login');
Route:: get('/',[RegistrationController::class,'index']);
Route::post('auth',[RegistrationController::class,'auth'])->name('auth');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard',[RegistrationController::class,'dashboard']);
});

