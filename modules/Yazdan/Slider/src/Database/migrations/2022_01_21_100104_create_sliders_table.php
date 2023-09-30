<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Yazdan\Slider\Repositories\SliderRepository;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();

            $table->float("priority")->nullable();
            $table->string("title")->nullable();
            $table->text("description")->nullable();
            $table->string("link")->nullable();
            $table->boolean("status")->default(true);

            $table->foreignId('media_id')->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('set null');

            $table->enum("type", SliderRepository::$types);

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
        Schema::dropIfExists('sliders');
    }
}
