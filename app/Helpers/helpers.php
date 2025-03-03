<?php

namespace App\Helpers;

use App\Models\UserActionHistory;
use Carbon\Carbon;

class Helpers
{

    public static function addUserActionHistory(int $user_id, string $action, string $details): void
    {
        // Track User Actions
        UserActionHistory::create([
            'user_id' => $user_id,
            'action' => $action,
            'details' => $details,
            'timestamp' => Carbon::now(),
            'ip_address' => request()->ip(),
            'device_type' => request()->header('User-Agent'),
        ]);
    }
}
