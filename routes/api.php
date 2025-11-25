<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('weather')->controller(WeatherController::class)->group(
function()
{
  Route::get('current','Current');
  Route::get('forecast',"Forecast");
  Route::get('search',"Search");
}
);
