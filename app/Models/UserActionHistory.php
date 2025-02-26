<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActionHistory extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'user_action_history';
    protected $fillable = ['user_id', 'action', 'timestamp', 'details', 'ip_address', 'device_type'];
}
