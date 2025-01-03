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
        Schema::create('notifications', function (Blueprint $table) {

           $table->id();
            $table->foreignId('notification_template')->references('id')->on('notification_templates');
            $table->foreignId('sender_id')->references('id')->on('user_profiles');
           $table->integer('receiver_id');
           $table->string('receiver_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
