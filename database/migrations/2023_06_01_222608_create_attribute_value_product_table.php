<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attribute_value_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_value_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('attribute_value_id')->references('id')->on('attribute_values')->onDelete('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_value_product');
    }
};
