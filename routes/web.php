<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BackendPostController;
use App\Http\Controllers\BackendComentController;
use App\Http\Controllers\FrontendController;
use App\Models\Post;
use App\Models\Coment;

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



Route::get('/backend/index', [BackendController::class, 'index'])->name('backend.index');


Route::resource('backend/post', BackendPostController::class,['names' => 'backend.post'] );

Route::resource('backend/coment', BackendComentController::class,['names' => 'backend.coment'] );


Route::get('backend/coment/create/{idpost}', [BackendComentController::class, 'createComentEp'])->name('backend.coment.createcomentep');
Route::get('backend/coment/{idpost}/coment', [BackendComentController::class, 'showComents'])->name('backend.ticket.showcoments');


Route::get('/frontend/index', [FrontendController::class, 'index'])->name('frontend.index');

Route::get('frontend/base/{id}', [FrontendController::class, 'showPost'])->name('frontend.base.showpost');
Route::post('frontend/base', [FrontendController::class, 'store'])->name('frontend.base.store');








 Route::get('/', function () {
      $posts=Post::all();
     return view('frontend.index', ['posts'=>$posts] );
 });
