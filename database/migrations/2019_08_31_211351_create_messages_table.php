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
            $table->boolean('read')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
