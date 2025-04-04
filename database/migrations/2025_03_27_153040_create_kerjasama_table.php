<?php

use App\Models\Pelanggan;
use App\Models\Requestmitra;
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
        Schema::create('kerjasama', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Requestmitra::class);
            $table->foreignIdFor(Pelanggan::class);
            $table->string('noTelp_usaha');
            $table->string('email_usaha');
            $table->string('alamat_usaha');
            $table->decimal('harga01', 15, 2);
            $table->text('ket_harga01');
            $table->decimal('harga02', 15, 2);
            $table->text('ket_harga02');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjasama');
    }
};
