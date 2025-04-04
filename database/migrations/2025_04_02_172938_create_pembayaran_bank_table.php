<?php

use App\Models\Bank;
use App\Models\Pembayaran;
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
        Schema::create('pembayaran_bank', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pembayaran::class)->constrained();
            $table->foreignIdFor(Bank::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_bank');
    }
};
