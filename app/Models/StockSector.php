<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class StockSector extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'stock_sector';


    // One stock sector can have MANY stocks
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class, 'sector_name');
    }
}
