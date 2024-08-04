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
        Schema::table('user_favorites', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('barber_id')->references('id')->on('barbers');
        });

        Schema::table('user_appointments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('barber_id')->references('id')->on('barbers');
        });

        Schema::table('barber_photos', function (Blueprint $table) {
            $table->foreign('barber_id')->references('id')->on('barbers');
        });

        Schema::table('barber_reviews', function (Blueprint $table) {
            $table->foreign('barber_id')->references('id')->on('barbers');
        });

        Schema::table('barber_services', function (Blueprint $table) {
            $table->foreign('barber_id')->references('id')->on('barbers');
        });

        Schema::table('barber_testimonials', function (Blueprint $table) {
            $table->foreign('barber_id')->references('id')->on('barbers');
        });

        Schema::table('barber_availabilities', function (Blueprint $table) {
            $table->foreign('barber_id')->references('id')->on('barbers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barber_availabilities', function (Blueprint $table) {
            $table->dropForeign('barber_availabilities_barber_id_foreign');
        });

        Schema::table('barber_testimonials', function (Blueprint $table) {
            $table->dropForeign('barber_testimonials_barber_id_foreign');
        });

        Schema::table('barber_services', function (Blueprint $table) {
            $table->dropForeign('barber_services_barber_id_foreign');
        });

        Schema::table('barber_reviews', function (Blueprint $table) {
            $table->dropForeign('barber_reviews_barber_id_foreign');
        });

        Schema::table('barber_photos', function (Blueprint $table) {
            $table->dropForeign('barber_photos_barber_id_foreign');
        });

        Schema::table('user_appointments', function (Blueprint $table) {
            $table->dropForeign('user_appointments_user_id_foreign');
            $table->dropForeign('user_appointments_barber_id_foreign');
        });

        Schema::table('user_favorites', function (Blueprint $table) {
            $table->dropForeign('user_favorites_user_id_foreign');
            $table->dropForeign('user_favorites_barber_id_foreign');
        });

    }
};
