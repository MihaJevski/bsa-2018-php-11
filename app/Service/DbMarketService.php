<?php

namespace App\Service;

use App\Entity\Lot;
use App\Entity\Trade;
use App\Exceptions\MarketException\ActiveLotExistsException;
use App\Exceptions\MarketException\BuyInactiveLotException;
use App\Exceptions\MarketException\BuyNegativeAmountException;
use App\Exceptions\MarketException\BuyOwnCurrencyException;
use App\Exceptions\MarketException\IncorrectLotAmountException;
use App\Exceptions\MarketException\IncorrectPriceException;
use App\Exceptions\MarketException\IncorrectTimeCloseException;
use App\Exceptions\MarketException\LotDoesNotExistException;
use App\Request\Contracts\AddLotRequest;
use App\Request\Contracts\BuyLotRequest;
use App\Response\Contracts\LotResponse;
use App\Service\Contracts\MarketService;

class DbMarketService implements MarketService
{

    /**
     * Sell currency.
     *
     * @param AddLotRequest $lotRequest
     *
     * @throws ActiveLotExistsException
     * @throws IncorrectTimeCloseException
     * @throws IncorrectPriceException
     *
     * @return Lot
     */
    public function addLot(AddLotRequest $lotRequest): Lot
    {
        $lot = new Lot();
        $lot->currency_id = $lotRequest->getCurrencyId();
        $lot->date_time_open = $lotRequest->getDateTimeOpen();
        $lot->date_time_close = $lotRequest->getDateTimeClose();
        $lot->price = $lotRequest->getPrice();
        //todo send to repositiry
        return $lot;
    }

    /**
     * Buy currency.
     *
     * @param BuyLotRequest $lotRequest
     *
     * @throws BuyOwnCurrencyException
     * @throws IncorrectLotAmountException
     * @throws BuyNegativeAmountException
     * @throws BuyInactiveLotException
     *
     * @return Trade
     */
    public function buyLot(BuyLotRequest $lotRequest): Trade
    {
        // TODO: Implement buyLot() method.
    }

    /**
     * Retrieves lot by an identifier and returns it in LotResponse format
     *
     * @param int $id
     *
     * @throws LotDoesNotExistException
     *
     * @return LotResponse
     */
    public function getLot(int $id): LotResponse
    {
        // TODO: Implement getLot() method.
    }

    /**
     * Return list of lots.
     *
     * @return LotResponse[]
     */
    public function getLotList(): array
    {
        // TODO: Implement getLotList() method.
    }
}