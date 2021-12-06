<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriCoverGambar extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'materi_cover_gambar';
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "materi_id",
        "cover"
    ];

    public function materi()
    {
        $this->belongsTo(Materi::class);
    }
}
