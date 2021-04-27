<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckWords;

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

Route::get('/' ,[TeamController::class,'index']);

Route::get('/teams/{team}',[TeamController::class,'show'])->name('team');

Route::get('/teams/{team}/{player}',[PlayerController::class,'show'])->name('player');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::post('/teams/{team}/comments',[CommentController::class,'store'])->name('createComment')->middleware(CheckWords::class);





Route::group(['middleware'=>'guest','verified'],function(){
    
    Route::get('/register',[AuthController::class,'getRegisterForm']);
    
    Route::post('/register',[AuthController::class,'register'])->name('login');
    
    Route::get('/login',[AuthController::class,'getLoginForm']);
    
    Route::post('/login',[AuthController::class,'login'])->name('login');
});

// Putanje za verifikaciju mejla

Route::get('/email/verify',function(){
   
    return view ('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}',function(EmailVerificationRequest $request){
    
    $request->fulfill();

    return redirect('/');
})->middleware('auth','signed')->name('verification.verify');

Route::post('/email/verification-notification',function(Request $request){
  $request->user()->sendEmailVerificationNotification();

  return back()->with('message','Verification link sent!');
})->middleware(['auth','throttle:6,1'])->name('verification.send');

