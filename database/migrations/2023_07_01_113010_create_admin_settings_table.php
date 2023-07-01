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
        Schema::create('admin_settings', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->string('phone');
            $table->string('description');
            $table->text('email');
            $table->text('text');
            $table->text('address');
            $table->text('facebook');
            $table->text('twitter');
            $table->text('linkedin');
            $table->text('pinterest');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_settings');
    }
};
