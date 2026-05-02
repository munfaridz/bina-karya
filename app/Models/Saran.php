<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'pesan',
        'kategori',
        'status',
        'balasan',
        'ip_address',
    ];
}