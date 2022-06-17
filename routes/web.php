<?php

use App\Http\Controllers\admin\admininsertController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminviewsController;
use App\Http\Controllers\frontend\frontendviewsController;

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

Route::get('admindashboard',[adminviewsController::class,'admindashboard'])->name('admindashboard');

Route::get('addmedicin',[adminviewsController::class,'addmedicin'])->name('addmedicin');
Route::get('viewalldrugs',[adminviewsController::class,'viewalldrugs'])->name('viewalldrugs');
Route::get('registerbranch',[adminviewsController::class,'registerbranch'])->name('registerbranch');
Route::get('productsalenow',[adminviewsController::class,'productsalenow'])->name('productsalenow');
Route::post('addnewbranch',[admininsertController::class,'addnewbranch'])->name('addnewbranch');
Route::get('viewallusers',[adminviewsController::class,'viewallusers'])->name('viewallusers');
Route::post('makemanager/{id}',[admininsertController::class,'makemanager'])->name('makemanager');
Route::get('viewmanager',[adminviewsController::class,'viewmanager'])->name('viewmanager');
Route::get('demotemanager/{id}',[admininsertController::class,'demotemanager'])->name('demotemanager');
Route::get('registermanager/{id}',[adminviewsController::class,'registermanager'])->name('registermanager');
Route::post('adddrog',[admininsertController::class,'adddrog'])->name('adddrog');
Route::post('addtocartpos/{id}',[admininsertController::class,'addtocartpos'])->name('addtocartpos');
Route::get('deleteposcart/{id}',[admininsertController::class,'deleteposcart'])->name('deleteposcart');
Route::post('checkoutpos',[admininsertController::class,'checkoutpos'])->name('checkoutpos');

//
Route::get('viewallbranch',[adminviewsController::class,'viewallbranch'])->name('viewallbranch');
//frontend
Route::get('/',[frontendviewsController::class,'index'])->name('index');
Route::get('details/{id}',[frontendviewsController::class,'details'])->name('details');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
