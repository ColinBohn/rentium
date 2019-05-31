<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstantOfferStoreTest extends TestCase
{
    // Refresh the database after every test.
    use RefreshDatabase;

    /**
     * Tests that a correct request stores an offer.
     * 
     * @return void
     */
    public function testCorrectRequestIsAccepted()
    {
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

        $response = $this->json('POST', '/api/instant-offers', $data);
        $response->assertStatus(201);
        $response->assertJsonMissingValidationErrors();
        $response->assertJson([
            'data' => $data
        ]);
    }

    /**
     * Tests that an empty post returns a failure.
     *
     * @return void
     */
    public function testEmptyPostFails()
    {
        $response = $this->json('POST', '/api/instant-offers', []);
        $response->assertStatus(422);
    }

    /**
     * Tests that an invalid email returns an error.
     * 
     * @return void
     */
    public function testEmailValidation()
    {
        $data = [
            'email' => '',
            'address' => '1234 Any Street',
            'city' => 'Everett',
            'state' => 'WA',
            'zip' => 98204,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'square_footage' => 1300,
        ];

        // Test that an empty email returns a required error
        $response = $this->json('POST', '/api/instant-offers', $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('email');

        // Test that an invalid email returns an email validation error
        $data['email'] = 'an-invalid-email';
        $response = $this->json('POST', '/api/instant-offers', $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('email');

        // Test that an excessively long email returns an email validation error
        $data['email'] = str_repeat('a', 250) . '@gmail.com';
        $response = $this->json('POST', '/api/instant-offers', $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('email');
    }
}
