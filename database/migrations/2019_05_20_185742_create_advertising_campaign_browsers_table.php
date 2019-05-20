<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisingCampaignBrowsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_campaign_browsers', function (Blueprint $table) {
            $table->bigInteger('advertising_campaign_id');
            $table->integer('browser_id');
            $table->primary(['advertising_campaign_id', 'browser_id']);
        });

        Schema::table('advertising_campaign_browsers', function($table) {
            $table->foreign('advertising_campaign_id')->references('id')->on('advertising_campaign');
            $table->foreign('browser_id')->references('id')->on('browsers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertising_campaign_browsers');
    }
}
