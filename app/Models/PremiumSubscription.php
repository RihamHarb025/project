<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PremiumSubscription extends Model
{
    protected $fillable = [
        'user_id', 'plan', 'start_date', 'end_date'
    ];
}
