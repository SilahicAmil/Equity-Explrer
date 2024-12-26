<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TradeType extends Model
{
    protected $table = 'trade_type';

    public function trades(): HasMany
    {
        return $this->hasMany(Trade::class, 'trade_type');
    }
}
