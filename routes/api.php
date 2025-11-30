<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PostApiController;

Route::apiResource('post',PostApiController::class);