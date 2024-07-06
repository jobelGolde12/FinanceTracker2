<?php

// use App\Http\Controllers\UserController;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;



// // Route::middleware('auth:sanctum')
// Route::post('/signup', [UserController::class , 'store']);
// // Route::get('/getUser', [UserController::class, 'index']);
// Route::post('/login', [UserController::class, 'login']);
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/getUser', [UserController::class, 'getTheUser']);

use App\Http\Controllers\SomeQuestionsController;
use App\Http\Controllers\TransctionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/signup', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->get('/user', function () {
    return auth()->user();
});

Route::get('/getUser', [UserController::class, 'getTheUser']);
Route::post('/getUsername', [UserController::class, 'getTheUsername']);


Route::post('/addTransaction', [TransctionController::class, 'saveTransactions']);
// Post to a getTransactions because i need to post an id first 
Route::post('/getTransaction', [TransctionController::class, 'getTransactions']);

Route::get('getQuestions', [SomeQuestionsController::class, 'getQuestionsData']);


