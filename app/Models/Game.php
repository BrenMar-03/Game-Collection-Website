<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'cover_image', 'platform',
        'genre', 'release_year', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}