<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'penulis';
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "guru_id",
        "foto_profile",
        "description"
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    public function balasKomentar()
    {
        return $this->hasMany(BalasKomentar::class);
    }
}
