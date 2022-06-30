<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_time');
            $table->dateTime('close_time');
            $table->string('status', 50);
            $table->bigInteger('start_price');
            $table->bigInteger('step_price');
            $table->bigInteger('highset_price');
            $table->integer('winner_id');
            // $table->unsignedBigInteger('winner_id');
            // $table->foreign('winner_id')->references('user_id')->on('bids');
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
        Schema::dropIfExists('auctions');
    }
}
