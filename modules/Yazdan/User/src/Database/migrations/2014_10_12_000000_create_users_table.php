<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Yazdan\User\Repositories\UserRepository;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('key')->nullable();

            $table->string('name')->nullable();
            $table->string('username', 50)->unique();
            $table->string('email')->unique();
            $table->string('mobile', 14)->nullable();

            $table->string('ip')->nullable();

            $table->foreignId('avatar_id')->nullable();
            $table->foreign('avatar_id')->references('id')->on('media')->onDelete('set null');

            $table->enum('status', UserRepository::$statuses)->default(UserRepository::STATUS_ACTIVE);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
