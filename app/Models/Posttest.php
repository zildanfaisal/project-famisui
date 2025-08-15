<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posttest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_id',
        'skor',
        'intensitas_menyusui',
        'susu_formula',
        'perawatan',
        'kendala_menyusui',
        'konsultasi_kendala',
    ];

    protected $casts = [
        'perawatan' => 'array',
        'susu_formula' => 'boolean',
        'konsultasi_kendala' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
