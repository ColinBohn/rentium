<?php

namespace App\Http\Controllers;

use App\InstantOffer;
use App\Traits\RespondsWithJson;
use App\Http\Requests\InstantOfferRequest;
use App\Http\Resources\InstantOfferResource;
use App\Http\Resources\InstantOfferCollection;

class InstantOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InstantOfferResource::collection(InstantOffer::orderBy('id', 'desc')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\InstantOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstantOfferRequest $request)
    {
        $offer = new InstantOffer;
        $offer->fill($request->all());
        $offer->createEstimate()->save();
        return new InstantOfferResource($offer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InstantOffer  $instantOffer
     * @return \Illuminate\Http\Response
     */
    public function show(InstantOffer $instantOffer)
    {
        return new InstantOfferResource($instantOffer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\InstantOfferRequest  $request
     * @param  \App\InstantOffer  $instantOffer
     * @return \Illuminate\Http\Response
     */
    public function update(InstantOfferRequest $request, InstantOffer $instantOffer)
    {
        $instantOffer->update($request);
        return new InstantOfferResource($instantOffer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InstantOffer  $instantOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstantOfferRequest $instantOffer)
    {
        $instantOffer->delete();
        return $this->respondDeleted();
    }
}
