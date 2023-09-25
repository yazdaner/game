<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CouponLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_level',function(Blueprint $table) {
            $table->foreignId('coupon_id');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('CASCADE');

            $table->foreignId('level_id');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('CASCADE');

            $table->primary(['coupon_id','level_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_level');
    }
}
