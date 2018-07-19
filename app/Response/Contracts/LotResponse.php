<?php

namespace App\Response\Contracts;

interface LotResponse
{
    /**
     * An identifier of lot
     *
     * @return int
     */
    public function getId() : int;

    public function getUserName() : string;

    public function getCurrencyName() : string;

    /**
     * All amount of currency that user has in the wallet.
     *
     * @return float
     */
    public function getAmount() : float;

    /**
     * Format: yyyy/mm/dd hh:mm:ss
     *
     * @return string
     */
    public function getDateTimeOpen() : string;

    /**
     * Format: yyyy/mm/dd hh:mm:ss
     *
     * @return string
     */
    public function getDateTimeClose() : string;

    /**
     * Price per one amount of currency.
     *
     * Format: 00,00
     *
     * @return string
     */
    public function getPrice() : string;
}