<?php

namespace App\Request;

use App\Request\Contracts\AddLotRequest;
use Illuminate\Http\Request;

class DbAddLotRequest implements AddLotRequest
{
    private $request;

    public function __construct($request)
    {

        $this->request = $request;
    }

    public function getCurrencyId(): int
    {
        return $this->request->currency_id;
    }

    /**
     * An identifier of user
     *
     * @return int
     */
    public function getSellerId(): int
    {
        // TODO: Implement getSellerId() method.
    }

    /**
     * Timestamp
     *
     * @return int
     */
    public function getDateTimeOpen(): int
    {
        return $this->request->date_time_open;
    }

    /**
     * Timestamp
     *
     * @return int
     */
    public function getDateTimeClose(): int
    {
        return $this->request->currency_id;
    }

    public function getPrice(): float
    {
        // TODO: Implement getPrice() method.
    }
}