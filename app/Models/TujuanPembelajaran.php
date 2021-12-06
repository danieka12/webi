<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanPembelajaran extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'tujuan_pembelajaran';
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "guru_id",
        "materi_id",
        "description"
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
