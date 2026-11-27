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
        Schema::create('cms_home', function (Blueprint $table) {
            $table->id();
            $table->string('section')->unique();
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });
        Schema::create('cms_about', function (Blueprint $table) {
            $table->id();
            $table->string('section')->unique();
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });
        Schema::create('cms_contact', function (Blueprint $table) {
            $table->id();
            $table->string('section')->unique();
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });
        Schema::create('cms_article', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cms_home', function (Blueprint $table) {
            Schema::dropIfExists('cms_home');
        });
        Schema::table('cms_about', function (Blueprint $table) {
            Schema::dropIfExists('cms_about');
        });
        Schema::table('cms_contact', function (Blueprint $table) {
            Schema::dropIfExists('cms_contact');
        });
        Schema::table('cms_article', function (Blueprint $table) {
            Schema::dropIfExists('cms_article');
        });
    }
};
