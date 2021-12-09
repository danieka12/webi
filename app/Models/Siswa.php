<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

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
        "name",
        "password"
    ];
    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute(string $value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function gabungMateri()
    {
        return $this->hasOne(GabungMateri::class);
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
