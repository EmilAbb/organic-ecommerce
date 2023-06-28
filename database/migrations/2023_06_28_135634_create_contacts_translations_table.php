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
        Schema::create('contacts_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_id')->unsigned();
            $table->string('title',255);
            $table->text('text');
            $table->string('locale')->index();
            $table->unique(['contact_id','locale']);
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts_translations');
    }
};
