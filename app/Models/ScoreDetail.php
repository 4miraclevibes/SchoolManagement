<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ScoreDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'score_id', 'name', 'score',
    ];

    public function score()
    {
        return $this->belongsTo(Score::class);
    }
}
