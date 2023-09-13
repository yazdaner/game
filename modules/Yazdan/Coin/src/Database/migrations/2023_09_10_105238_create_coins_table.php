<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinsTable extends Migration
{

    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('coin');
            $table->foreignId('media_id')->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('set null');
            $table->unsignedBigInteger('price')->default(10000);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coins');
    }
}
