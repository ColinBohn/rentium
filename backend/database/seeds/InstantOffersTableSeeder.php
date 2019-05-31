<?php

use Illuminate\Database\Seeder;

class InstantOffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\InstantOffer::class, 50)->make()->each(function ($offer) {
            $offer->createEstimate();
            $offer->save();
        });
    }
}
