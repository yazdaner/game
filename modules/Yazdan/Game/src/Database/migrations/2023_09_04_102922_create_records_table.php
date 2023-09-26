<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Yazdan\Game\Repositories\RecordRepository;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('claimRecord')->nullable();

            $table->foreignId('media_id')->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('SET NULL');

            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');

            $table->foreignId('level_id')->nullable();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('SET NULL');

            $table->boolean('coin')->default(false);

            $table->foreignId('coupon_id')->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('SET NULL');

            $table->enum('status', RecordRepository::$statuses);

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
        Schema::dropIfExists('records');
    }
}
