<?php

namespace App\Repository\Contracts;

use App\Entity\Trade;

interface TradeRepository
{
    public function add(Trade $trade) : Trade;
}