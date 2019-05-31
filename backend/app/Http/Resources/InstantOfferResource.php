<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InstantOfferResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                      => (int)$this->id,
            'email'                   => $this->email,
            'address'                 => $this->address,
            'city'                    => $this->city,
            'state'                   => $this->state,
            'zip'                     => (int)$this->zip,
            'bedrooms'                => (int)$this->bedrooms,
            'bathrooms'               => (int)$this->bathrooms,
            'square_footage'          => (int)$this->square_footage,
            'estimated_full_rent'     => (int)$this->estimated_full_rent,
            'estimated_renter_rent'   => (int)$this->estimated_renter_rent,
            'estimated_airbnb_income' => (int)$this->estimated_airbnb_income,
            'offer_made'              => (bool)$this->offer_made,
            'offer_amount'            => (int)$this->offer_amount,
            'created_at'              => $this->created_at,
            'updated_at'              => $this->updated_at,
        ];
    }
}
