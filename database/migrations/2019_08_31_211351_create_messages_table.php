<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');

            $table->string('name')->nullable(); //portfolio or profile
            $table->string('email')->nullable(); //portfolio or profile

            $table->string('subject')->nullable();
            $table->longText('message')->nullable();

            $table->string('ip_address')->nullable();
            $table->string('country')->nullable();
            $table->string('other_info')->nullable();

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
        Schema::dropIfExists('messages');
    }
}
