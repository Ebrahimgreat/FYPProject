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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('location');
            $table->string('sku')->nullable();
            $table->string('unitPurchasePrice')->nullable();
            $table->timestamps();
            $table->foreignId('unit_id')->references('id')->on('units');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
