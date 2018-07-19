<?php

namespace App\Request\Contracts;

interface MoneyRequest
{
    public function getWalletId() : int;

    public function getCurrencyId() : int;

    public function getAmount() : float;
}