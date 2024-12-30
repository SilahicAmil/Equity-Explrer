<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';

    protected $fillable = [
        'user_id',
        'starting_balance',
        'current_balance',
        'rank',
        'total_gain',
        'created_at',
        'updated_at'
    ];


    // Make user connection
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
