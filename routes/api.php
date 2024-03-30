<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SaveQuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user',[AuthController::class, 'loggedUser']);


Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);


Route::apiResource('/question', QuestionController::class);
Route::apiResource('/response', ResponseController::class);
Route::apiResource('/question.response', ResponseController::class);
Route::apiResource('/saveQuestion', SaveQuestionController::class);
Route::apiResource('/question.saveQuestion', SaveQuestionController::class);