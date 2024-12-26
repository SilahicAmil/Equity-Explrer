<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trade extends Model
{

    protected $table = 'trades';
    

    public function tradeType(): BelongsTo
    {

        return $this->belongsTo(TradeType::class, 'trade_type');
    }
}
