<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'guru'; // renaming table name
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "email",
        "nama",
        "password"
    ];

    public function setPasswordAttribute(string $value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function penulis()
    {
        return $this->hasOne(Penulis::class);
    }
}
