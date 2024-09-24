<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleQuiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_quiz_id',
        'schedule_id',
    ];

    public function subjectQuiz()
    {
        return $this->belongsTo(SubjectQuiz::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
