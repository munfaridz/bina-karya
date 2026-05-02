<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'status',
        'gambar',
        'unggulan',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'unggulan' => 'boolean',
    ];

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'akan_datang' => 'Akan Datang',
            'berlangsung' => 'Berlangsung',
            'selesai' => 'Selesai',
            default => '-',
        };
    }
}