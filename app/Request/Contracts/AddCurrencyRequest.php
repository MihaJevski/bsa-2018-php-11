<?php

namespace App\Request\Contracts;

interface AddCurrencyRequest
{
    public function getName() : string;
}