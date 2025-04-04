<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaketPernikahan extends Model
{
    /** @use HasFactory<\Database\Factories\PaketPernikahanFactory> */
    use HasFactory;
    protected $table = 'paket_pernikahan';
    protected $guarded = [];
    protected $casts = [
        'hargaDP_paket' => 'decimal:2',
        'hargaLunas_paket' => 'decimal:2',
    ];

    public function kerjasama(): BelongsToMany
    {
        return $this->belongsToMany(Kerjasama::class, 'paket_pernikahan_kerjasama');
    }

    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class);
    }
}
