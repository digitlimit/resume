<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('profile_id')->unique();

            $table->string('address_1')->nullable(); //portfolio or profile
            $table->string('address_2')->nullable(); //portfolio or profile

            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();

            $table->string('email')->nullable();

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
        Schema::dropIfExists('contacts');
    }
}
