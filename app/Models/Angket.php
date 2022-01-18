<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angket extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'gabung_materi'; // renaming table name
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "guru_id",
        "siswa_id",
        "materi_id",
        "kejelasan_pembelajaran",
        "kelengkapan_materi",
        "contoh_penjelasan",
        "kejelasan_bahasa",
        "pemahaman_materi",
        "kemudahan_pemakaian",
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
