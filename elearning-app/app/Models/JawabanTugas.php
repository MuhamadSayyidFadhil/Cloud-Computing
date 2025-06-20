<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanTugas extends Model
{
    use HasFactory;

    protected $table = 'jawaban_tugas';

    protected $fillable = [
        'tugas_id',
        'siswa_id',
        'file',
        'nilai',
        'komentar',
    ];

public function siswa()
{
    return $this->belongsTo(User::class, 'siswa_id');
}

public function tugas()
{
    return $this->belongsTo(Tugas::class);
}
}
