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
        Schema::create('paket_pernikahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('venue')->nullable();
            $table->string('dekorasi')->nullable();
            $table->string('tata_rias')->nullable();
            $table->string('staff_acara')->nullable();
            $table->string('catering')->nullable();
            $table->string('kue_pernikahan')->nullable();
            $table->string('fotografer')->nullable();
            $table->string('entertaiment')->nullable();
            $table->decimal('hargaDP_paket', 15, 2);
            $table->decimal('hargaLunas_paket', 15, 2);
            $table->string('status_paket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_pernikahan');
    }
};
