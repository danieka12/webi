<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'mengajar';
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "guru_id",
        "materi_id",
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function materi()
    {
        return $this->hasOne(Materi::class);
    }
}
