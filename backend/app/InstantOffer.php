<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstantOffer extends Model
{
    public $fillable = ['email', 'address', 'city', 'state', 'zip', 'bedrooms', 'bathrooms', 'square_footage'];

    /**
     * Calculates estimates for potential property income, and fills fields on model:
     * - estimated_full_rent, estimated_renter_rent, estimated_airbnb_income, offer_made, offer_amount
     * @return InstantOffer
     */
    public function createEstimate()
    {
        // Set rent estimates to hard-coded values
        $this->estimated_full_rent = 3732;
        $this->estimated_renter_rent = 2887;

        // Choose a hard-coded Airbnb income amount by modding a checksum for address.
        // This will return the same offer for identical inputs, thus improving the demo quality.
        $airbnbIncomes = [1905, 2448, 3036, 3251, 3177, 2549, 1527, 1117, 1145, 1155, 1172, 1973];
        $airbnbIncomeIndex = abs(crc32($this->address)) % (count($airbnbIncomes) - 1);
        $this->estimated_airbnb_income = $airbnbIncomes[$airbnbIncomeIndex];

        $annualFullRent = $this->estimated_full_rent * 12;
        $annualRenterRent = $this->estimated_renter_rent * 12;
        $annualAirbnbIncome = $this->estimated_airbnb_income * 12;

        // The annual rent for renter’s portion of the home combined with the annual Airbnb
        // estimate should be at least $4,000 greater than the annual rent of the entire home.
        if ($annualRenterRent + $annualAirbnbIncome > $annualFullRent + 4000) {
            // So long as the annual renter rate and Airbnb estimate is over $4,000 greater than the annual entire
            // home rent, the offer should be equivalent to the entire home rate + 10% of the Airbnb income.
            $this->offer_made = true;
            $this->offer_amount = round($this->estimated_full_rent + ($this->estimated_airbnb_income / 10));
        } else {
            $this->offer_made = false;
            $this->offer_amount = NULL;
        }
        
        return $this;
    }
}
