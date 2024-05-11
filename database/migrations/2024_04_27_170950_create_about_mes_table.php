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
        Schema::create('about_mes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->string('cv');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('birthday');
            $table->string('degree');
            $table->string('experience');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('github')->nullable();
            $table->string('skype')->nullable();
            $table->string('discord')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();
            $table->string('youtube')->nullable();
            $table->boolean('freelance_status')->default(false);
            $table->boolean('is_active')->default(true);
            $table->text('positions')->default('Backend Developer, Java Developer, Web Developer, Lead Backend');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_mes');
    }
};
