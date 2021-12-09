<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalasKomentar extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'balas_komentar';
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "komentar_id",
        "penulis_id",
        "siswa_id",
        "konten"
    ];

    public function komentar()
    {
        return $this->belongsTo(Komentar::class);
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
