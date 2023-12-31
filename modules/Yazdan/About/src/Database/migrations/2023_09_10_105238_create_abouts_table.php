<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{

    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            $table->longText('body')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}

