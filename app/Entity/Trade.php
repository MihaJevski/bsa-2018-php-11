<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = [
        "id",
        "lot_id",
        "user_id",
        "amount"
    ];
}
