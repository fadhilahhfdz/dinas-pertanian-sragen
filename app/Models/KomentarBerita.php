<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarBerita extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'komentar',
        'id_berita',
    ];

    public function berita() {
        return $this->belongsTo(Berita::class, 'id_berita', 'id');
    }
}
