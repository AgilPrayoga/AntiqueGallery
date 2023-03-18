<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\MiminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OuterController;
use App\Http\Controllers\UsersController;
use PhpParser\Node\Expr\FuncCall;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::controller(OuterController::class)->group(function(){
    Route::get('/','index')->name('home');
    
    }

);

Route::controller(UsersController::class)->group (function()
    {
    Route::get('/login','login_form')->name('login_form');
    Route::post('/login','login_action')->name('login_action');
    Route::get('/signup','sign_up_form')->name('sign_up_form');
    Route::post('/signup','sign_up_action')->name('sign_up_action');
    
    }

);

Route::controller(MiminController::class)->group(function(){
    Route::get('/admin','login_admin_form')->name('login_admin_form');
    Route::post('/admin','admin_action')->name('admin_action');
    Route::get('/dashboard','admin_dashboard')->name('admin_dashboard');
    Route::post('/adminlogout','admin_logout')->name('admin_logout');
    }

);

Route::controller(ItemsController::class)->group(function(){
    Route::post('/items', 'dashboard_action')->name('dashboard_action');
    Route::get('/showcase','showcase')->name('showcase');
    Route::post('/logout','showcase_logout')->name('showcase_logout');
    }
);
