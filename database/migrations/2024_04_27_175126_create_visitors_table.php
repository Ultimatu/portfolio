<?php

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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip');
            $table->string('session_id');
            $table->boolean('has_downloaded_cv')->default(false);
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('state_code')->nullable();
            $table->string('zip')->nullable();
            $table->boolean('is_first_time')->default(true);
            $table->timestamp('last_visit_at')->nullable();
            $table->timestamp('first_visit_at')->nullable();
            $table->string('device')->nullable();
            $table->integer('visits')->default(1);
            $table->string('browser')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
