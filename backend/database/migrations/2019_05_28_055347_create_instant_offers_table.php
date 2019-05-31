<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstantOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instant_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 255);
            $table->text('address');
            $table->string('city', 255);
            $table->string('state', 2);
            $table->unsignedMediumInteger('zip');
            $table->unsignedTinyInteger('bedrooms');
            $table->unsignedTinyInteger('bathrooms');
            $table->unsignedSmallInteger('square_footage');
            $table->unsignedSmallInteger('estimated_full_rent');
            $table->unsignedSmallInteger('estimated_renter_rent');
            $table->unsignedSmallInteger('estimated_airbnb_income');
            $table->boolean('offer_made');
            $table->unsignedSmallInteger('offer_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instant_offers');
    }
}
