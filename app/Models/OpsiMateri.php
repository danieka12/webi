<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpsiMateri extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'opsi_materi';
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "title"
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
