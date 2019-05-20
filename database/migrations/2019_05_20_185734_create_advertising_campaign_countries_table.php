<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisingCampaignCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_campaign_countries', function (Blueprint $table) {
            $table->bigInteger('advertising_campaign_id');
            $table->integer('country_id');
            $table->primary(['advertising_campaign_id', 'country_id']);
        });

        Schema::table('advertising_campaign_countries', function($table) {
            $table->foreign('advertising_campaign_id')->references('id')->on('advertising_campaign');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertising_campaign_countries');
    }
}
