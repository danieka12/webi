<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'komentar';
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "materi_id",
        "penulis_id",
        "siswa_id",
        "konten"
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
