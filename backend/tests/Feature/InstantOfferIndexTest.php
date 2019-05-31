<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IntstantOfferIndexTest extends TestCase
{
    // Refresh the database after every test.
    use RefreshDatabase;

    /**
     * Test instant offer index endpoint
     *
     * @return void
     */
    public function testInstantOfferIndex()
    {
        // Database is empty, so we should get a 200 response with empty dataset
        $response = $this->get('/api/instant-offers');
        $response->assertStatus(200);
        $response->assertJsonCount(0, 'data');

        // Persist 9 offers to the database
        factory(\App\InstantOffer::class, 9)->make()->each(function ($offer) {
            $offer->createEstimate()->save();
        });

        // First page should return 5 results
        $response = $this->get('/api/instant-offers');
        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');

        // Second page should return 4 results
        $response = $this->get('/api/instant-offers?page=2');
        $response->assertStatus(200);
        $response->assertJsonCount(4, 'data');

        // Third page should return 0 results
        $response = $this->get('/api/instant-offers?page=3');
        $response->assertStatus(200);
        $response->assertJsonCount(0, 'data');
    }
}
