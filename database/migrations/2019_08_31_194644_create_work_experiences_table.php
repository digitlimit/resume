<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('profile_id');

            $table->string('icon')->nullable();

            $table->string('job_title');
            $table->longText('job_description')->nullable();

            $table->string('start_month')->nullable();
            $table->string('end_month')->nullable();
            $table->integer('start_year')->nullable();
            $table->integer('end_year')->nullable();

            $table->string('company_name')->nullable();
            $table->string('company_info')->nullable();
            $table->string('company_address')->nullable();

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
        Schema::dropIfExists('work_experiences');
    }
}
