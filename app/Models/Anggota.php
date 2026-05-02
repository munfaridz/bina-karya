<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'divisi',
        'status',
        'no_hp',
        'alamat',
        'foto',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function kas()
    {
        return $this->hasMany(Kas::class);
    }

    public function getUmurAttribute(): int
    {
        return $this->tanggal_lahir->age;
    }

    public function getTotalKasAttribute(): float
    {
        return $this->kas()->where('status', 'lunas')->sum('nominal');
    }
}