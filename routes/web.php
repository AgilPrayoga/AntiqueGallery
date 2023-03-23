<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\MiminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OuterController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Artisan;
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
    Route::post('/logout','logout')->name('logout');
    Route::get('/showcase/{id}','card_detail')->name('card_detail');
    }

);

Route::controller(MiminController::class)->group(function(){
    Route::get('/admin','login_admin_form')->name('login_admin_form');
    Route::post('/admin','admin_action')->name('admin_action');
    Route::get('/dashboard','admin_dashboard')->name('admin_dashboard');
    Route::post('/items', 'dashboard_action')->name('dashboard_action');
    Route::get('/showcase','showcase')->name('showcase');
    Route::post('/delete','item_delete')->name('item_delete');
    Route::get('/editform','edit_form')->name('edit_form');
    Route::post('/edit','edit_action')->name('edit_action');
    


    }
    

);
Route::get('/linkstorage', function () {
        Artisan::call('storage:link'); // this will do the command line job
    });

