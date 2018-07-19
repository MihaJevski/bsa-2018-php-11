<?php

namespace App\Request\Contracts;

interface BuyLotRequest
{
    public function getUserId() : int;

    public function getLotId() : int;

    public function getAmount() : float;
}