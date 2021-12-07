<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'materi';
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "opsi_materi_id",
        "penulis_id",
        "judul",
        "konten"
    ];


    public function opsiMateri()
    {
        return $this->belongsTo(OpsiMateri::class);
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class);
    }

    public function materiCoverGambar()
    {
        return $this->hasOne(MateriCoverGambar::class);
    }

    public function tujuanPembelajaran()
    {
        return $this->hasOne(TujuanPembelajaran::class);
    }

    public function gabungMateri()
    {
        return $this->hasMany(GabungMateri::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
}
