<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\InstantOffer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstantOfferTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreatingOffer()
    {
        // Create an empty offer.
        $offer = new InstantOffer();
        $this->assertInstanceOf(InstantOffer::class, $offer);

        // Fill with sample data
        $data = [
            'email' => 'test@example.com',
            'address' => '1234 Any Street',
            'city' => 'Everett',
            'state' => 'WA',
            'zip' => 98204,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'square_footage' => 1300,
        ];
        $offer->fill($data);

        // These fields should be populated on creation.
        $this->assertEquals($offer->email, $data['email']);
        $this->assertEquals($offer->address, $data['address']);
        $this->assertEquals($offer->city, $data['city']);
        $this->assertEquals($offer->state, $data['state']);
        $this->assertEquals($offer->zip, $data['zip']);
        $this->assertEquals($offer->bedrooms, $data['bedrooms']);
        $this->assertEquals($offer->bathrooms, $data['bathrooms']);
        $this->assertEquals($offer->square_footage, $data['square_footage']);

        // These fields should not yet be populated.
        $this->assertEmpty($offer->estimated_full_rent);
        $this->assertEmpty($offer->estimated_renter_rent);
        $this->assertEmpty($offer->estimated_airbnb_income);
        $this->assertEmpty($offer->offer_made);
        $this->assertEmpty($offer->offer_amount);

        // Generate an estimate, which will populate fields below.
        $offer->createEstimate();

        // These fields should now be populated.
        $this->assertIsNumeric($offer->estimated_full_rent);
        $this->assertIsNumeric($offer->estimated_renter_rent);
        $this->assertIsNumeric($offer->estimated_airbnb_income);
        $this->assertIsBool($offer->offer_made);
        $this->assertIsNumeric($offer->offer_amount);
    }
}
