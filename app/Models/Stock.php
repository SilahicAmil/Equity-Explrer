<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Stock extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'stocks';


    // Add stock sector relation -- One stocks belongs to only 1 stock sector
    public function stockSector(): BelongsTo
    {
        return $this->belongsTo(StockSector::class, 'stock_sector');
    }
}
