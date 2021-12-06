<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'siswa';
    protected $primarykey = ['id', 'nis'];
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "nis",
        "nama",
        "password"
    ];
    protected $hidden = [
        'password'
    ];

    public function gabungMateri()
    {
        return $this->hasOne(GabungMateri::class);
    }
}
