<?php

use App\Http\Controllers\BookController;
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

// Route::get('/admin', function () {
//     return view('dasboard',[
//         'title'=> 'Dasboard'
//     ]);
// });

Route::get('/', [BookController::class, 'index']);
Route::get('/book/add-book', [BookController::class, 'addbookPage']);
Route::post('/book/store', [BookController::class, 'store']);
Route::post('/book/delete', [BookController::class, 'delete']);
Route::get('/book/{book:uniqid}/edit', [BookController::class, 'edit']);
Route::put('/book/update/{book:uniqid}', [BookController::class, 'update']);

Route::get('/categories', function () {
    return view('category',[
        'title'=> 'Categories'
    ]);
});
