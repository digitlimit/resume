<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('profile_id');

            $table->string('degree');
            $table->string('gpa')->nullable();

            $table->string('start_month')->nullable();
            $table->string('end_month')->nullable();
            $table->integer('start_year')->nullable();
            $table->integer('end_year')->nullable();

            $table->string('school_name')->nullable();
            $table->string('school_info')->nullable();
            $table->string('school_address')->nullable();

            $table->string('icon')->nullable();

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
        Schema::dropIfExists('educations');
    }
}
