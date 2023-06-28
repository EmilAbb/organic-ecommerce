<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organic_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organic_id')->unsigned();
            $table->string('title', 255);
            $table->text('text');
            $table->string('description',255);
            $table->string('locale')->index();
            $table->unique(['organic_id','locale']);
            $table->foreign('organic_id')->references('id')->on('organic')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organic_translations');
    }
};
