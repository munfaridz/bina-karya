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

}