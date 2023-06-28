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
        Schema::create('contact_map_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_map_id')->unsigned();
            $table->string('title',255);
            $table->string('phone');
            $table->string('text');
            $table->string('locale')->index();
            $table->unique(['contact_map_id','locale']);
            $table->foreign('contact_map_id')->references('id')->on('contact_map')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_map_translations');
    }
};
