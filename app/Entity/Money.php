<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    protected $fillable = [
        "wallet_id",
        "currency_id",
        "amount"
    ];
}
