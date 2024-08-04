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
        Schema::create('barber_testimonials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barber_id');
            $table->string('name');
            $table->float('rating');
            $table->string('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barber_testimonials');
    }
};
