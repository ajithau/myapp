<?php

use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('profile/{id}', function () {
//     $value = Cache::rememberForever('users', function () {
//         return DB::table('users')->get();
//     });
//     return $value;
// })->whereNumber('id');// only accept number as id
// // we have other funtions like where, whereAlpha etc...

Route::resource('posts', 'PostController')->middleware(['auth']);

Route::resource('products', 'ProductController')->middleware(['auth']);
Route::resource('categories', 'CategoryController')->middleware(['auth']);
Route::resource('subcategories', 'SubCategoryController')->middleware(['auth']);

require __DIR__.'/auth.php';
