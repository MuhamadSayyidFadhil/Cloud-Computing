<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JawabanTugas; // <-- Tambahkan ini

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = [
        'guru_id',
        'judul',
        'deskripsi',
        'file',
        'kelas',
        'deadline',
    ];

    public function jawaban()
    {
        return $this->hasMany(JawabanTugas::class);
    }
}
