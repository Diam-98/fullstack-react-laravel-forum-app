<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SaveQuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user',[AuthController::class, 'loggedUser']);


Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout']);


Route::apiResource('/question', QuestionController::class);
Route::apiResource('/response', ResponseController::class);
Route::apiResource('/question.response', ResponseController::class);
Route::apiResource('/saveQuestion', SaveQuestionController::class);
Route::apiResource('/question.saveQuestion', SaveQuestionController::class);

Route::get('/user/questions', [UserController::class, 'getMyQuestions']);
Route::get('/user/responses', [UserController::class, 'getMyResponses']);