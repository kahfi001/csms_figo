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
        Schema::table('vendor_details', function (Blueprint $table) {
            $table->string('direktur_phone')->nullable();
            $table->string('direktur_email')->nullable();
            $table->string('no_pkp')->nullable();
            $table->string('website')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_akta')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('titik_koordinat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendor_details', function (Blueprint $table) {
            $table->string('direktur_phone');
            $table->string('direktur_email');
            $table->string('no_pkp');
            $table->string('website');
            $table->text('alamat');
            $table->string('no_akta');
            $table->string('kode_pos');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('titik_koordinat');
        });
    }
};
