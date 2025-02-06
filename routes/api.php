<?php

use App\Http\Resources\StockResource;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/stockData', function () {
    return StockResource::collection(Stock::all());
});

// Add /trade with TradeController for 'store'