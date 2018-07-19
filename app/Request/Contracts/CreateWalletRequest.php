<?php

namespace App\Request\Contracts;

interface CreateWalletRequest
{
    public function getUserId() : int;
}
