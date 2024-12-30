<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TradeStatus extends Model
{
    protected $table = 'trade_statuses';

    public function trades(): HasMany
    {
        return $this->hasMany(Trade::class, 'trade_status');
    }
}
