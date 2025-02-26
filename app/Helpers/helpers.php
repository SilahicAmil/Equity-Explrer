<?php

use App\Models\UserActionHistory;
use Carbon\Carbon;

function addUserActionHistory(int $user_id, string $action, string $details): void
{
    // This will basically insert into user_action_history will all the info
    UserActionHistory::create([
        'user_id' => $user_id,
        'action' => $action,
        'details' => $details,
        'timestamp' => Carbon::now(),
        'ip_address' => request()->ip(),
        'device_type' => request()->header('User-Agent'),

    ]);
}
