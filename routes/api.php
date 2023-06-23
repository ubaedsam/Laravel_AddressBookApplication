<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupApiController;
use App\Http\Controllers\ContactApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Proses sistem login

// Halaman register
Route::post('/register',[AuthController::class,'register']);

// Halaman Login
Route::post('/login',[AuthController::class,'login']);

// Untuk mengakses beberapa sistem di bawah ini diperlukan token data yang di ambil setelah user sudah login
// Dengan mengecek lewat aplikasi atau website postman
Route::group(['middleware' =>['auth:sanctum']],function(){
    // Halaman utama group
    Route::get('/groups',[GroupApiController::class, 'index']);

    // Untuk search data group
    Route::get('/groups/search/{group}',[GroupApiController::class, 'search']);

    // Untuk proses tambah data group
    Route::post('/group',[GroupApiController::class, 'store']);

    // Untuk proses detail data group
    Route::get('/groups/{id}',[GroupApiController::class, 'show']);

    // Untuk proses ubah data group
    Route::put('/groups/{id}',[GroupApiController::class, 'update']);

    // Untuk proses hapus data group
    Route::delete('/groups/{id}',[GroupApiController::class, 'destroy']);

    // Halaman utama contact
    Route::get('/contacts',[ContactApiController::class, 'index']);

    Route::get('/blogs',[ContactApiController::class, 'list']);

    // Untuk proses filter data (1)
    Route::get('/contacts/filter/{data}',[ContactApiController::class, 'filter']);

    // Untuk proses tambah data contact
    Route::post('/contact',[ContactApiController::class, 'store']);

    // Untuk proses detail data contact
    Route::get('/contacts/{id}',[ContactApiController::class, 'show']);

    // Untuk proses ubah data contact
    Route::put('/contacts/{id}',[ContactApiController::class, 'update']);

    // Untuk proses hapus data contact
    Route::delete('/contacts/{id}',[ContactApiController::class, 'destroy']);

    Route::post('/logout',[AuthController::class,'logout']);
});