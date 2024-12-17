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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 15, 2)->default(0);
            $table->date('date');
            $table->foreignId('user_profiles_id')->references('id')->on('user_profiles');
            $table->string('status')->default('pending');
            $table->foreignId('suppliers_id')->references('id')->on('suppliers');
            $table->foreignId('expense_categories_id')->references('id')->on('expense_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
