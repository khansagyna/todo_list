<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // Field yang bisa diisi massal (mass assignment)
    protected $fillable = [
        'task',
        'user_id',
        'is_done',
    ];

    // Cast tipe data untuk is_done ke boolean
    protected $casts = [
        'is_done' => 'boolean',
    ];

    // Relasi: satu tugas dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
