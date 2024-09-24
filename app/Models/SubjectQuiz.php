<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectQuiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'quiz_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function scheduleQuizzes()
    {
        return $this->hasMany(ScheduleQuiz::class);
    }
}
