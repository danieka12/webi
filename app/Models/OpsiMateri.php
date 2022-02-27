<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OpsiMateri extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'opsi_materi';
    public $incrementing = false;
    public $keyType = 'uuid';
    protected $fillable = [
        "judul"
    ];

    protected $guarded = [
        'id',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    /**
     * Get the judul.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getJudulAttribute($value)
    {
        return Str::title($value);
    }
}
