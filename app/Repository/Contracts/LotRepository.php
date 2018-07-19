<?php

namespace App\Repository\Contracts;

use App\Entity\Lot;

interface LotRepository
{
    public function add(Lot $lot) : Lot;

    public function getById(int $id) : ?Lot;

    /**
     * @return Lot[]
     */
    public function findAll();

    public function findActiveLot(int $userId) : ?Lot;
}