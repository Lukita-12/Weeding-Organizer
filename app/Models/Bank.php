<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bank extends Model
{
    /** @use HasFactory<\Database\Factories\BankFactory> */
    use HasFactory;
    protected $table = 'bank';
    protected $guarded = [];

    public function pembayaran(): BelongsToMany
    {
        return $this->belongsToMany(Pembayaran::class);
    }
}
