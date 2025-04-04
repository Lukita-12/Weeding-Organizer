<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Requestmitra extends Model
{
    /** @use HasFactory<\Database\Factories\RequestmitraFactory> */
    use HasFactory;
    protected $table = 'requestmitra';
    protected $guarded = [];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function kerjasama(): HasOne
    {
        return $this->hasOne(Kerjasama::class);
    }
}
