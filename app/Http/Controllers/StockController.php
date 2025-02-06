<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockResource;
use App\Models\Stock;
use Inertia\Response;
use Inertia\ResponseFactory;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Stocks/Index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Stock Details Page
        return inertia('Stocks/Stock');
    }
}
