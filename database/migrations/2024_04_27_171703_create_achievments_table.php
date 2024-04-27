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
        Schema::create('achievments', function (Blueprint $table) {
            $table->id();
            $table->integer('experience');
            $table->integer('happy_clients');
            $table->integer('projects_completed');
            $table->integer('awards_won')->nullable();
            $table->integer('certifications')->nullable();
            $table->integer('years_of_experience');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievments');
    }
};
