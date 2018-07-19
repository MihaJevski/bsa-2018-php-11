<?php

namespace App\Repository\Contracts;

use App\User;

interface UserRepository
{
    public function getById(int $id) : ?User;
}
