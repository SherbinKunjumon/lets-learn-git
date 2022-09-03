<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productcontroller;
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
    return view('templayout');
});
Route::get('/', function () {
    return view('templayout');
});
Route::resource('/products',ProductController::class);

Route::get('download',[ProductController::class,'download']);
 Route::get('/storeimage', function () {
    return view('productupload');
});
Route::post('/storeimage',[ProductController::class,'storeimage']);

//});
 
 Route::get('/subcategory', function () {
    return view('subcategory',);
});
Route::get('/subcategory',[ProductController::class,'subcategory']);
Route::post('/subcategorystore',[ProductController::class,'subcategorystore']);
Route::get('/subcategoryselect',[ProductController::class,'subcategoryselect'])->name('subcategoryselect');
Route::get('/getproducts', [ProductController::class, 'getproducts'])->name('products.getproducts');
Route::get('/login', [ProductController::class, 'logincreate'])->name('logincreate');
Route::post('/login', [ProductController::class, 'login'])->name('products.login');
