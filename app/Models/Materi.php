<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'penulis';
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "opsi_materi_id",
        "penulis_id",
        "judul",
        "konten"
    ];


    public function opsiMateri() {
        return $this->belongsTo(OpsiMateri::class);
    }

    public function penulis() {
        return $this->belongsTo(Penulis::class);
    }
}
