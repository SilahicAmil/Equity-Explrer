<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trade extends Model
{

    protected $table = 'trades';

    protected $fillable = [
        'portfolio_id',
        'stock_id',
        'trade_type',
        'quantity',
        'price_per_stock',
        'total_amount',
        'trade_time',
        'status',
        'queue_time',
        'completion_time',
        'error_message',
        'created_at',
        'update_at'
    ];

    public function tradeType(): BelongsTo
    {

        return $this->belongsTo(TradeType::class, 'trade_type');
    }

    public function tradeStatuses(): BelongsTo
    {
        return $this->belongsTo(TradeStatus::class, 'trade_status');
    }

    public function portfolioID(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }
}
