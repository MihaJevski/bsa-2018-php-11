<?php

namespace App\Http\Controllers\Api;

use App\Entity\Lot;
use App\Http\Requests\LotRequest;
use App\Request\DbAddLotRequest;
use App\Service\Contracts\MarketService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LotController extends Controller
{
    /**
     * @var MarketService
     */
    private $marketService;

    public function __construct(MarketService $marketService)
    {

        $this->marketService = $marketService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request->all());
//        dd(Auth::user());
        $lot = $this->marketService->addLot(new DbAddLotRequest($request));
        $data['currency_id'] = $request->get('currency_id');
        $data['seller_id'] = $user = Auth::id();
        $data['date_time_open'] = Carbon::now()->timestamp;
        $data['date_time_close'] = Carbon::now()->addHours($request->get('time'))->timestamp;
        $data['price'] = $request->get('price');
        $lot = Lot::create([$data]);
        response()->json($lot);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
