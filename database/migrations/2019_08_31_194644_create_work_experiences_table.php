<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('profile_id');
            $table->string('icon')->nullable();
            $table->boolean('current')->default(false);
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
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
