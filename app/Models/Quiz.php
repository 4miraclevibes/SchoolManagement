<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'explanation',
        'passing_score',
    ];

    public function quizAnswers()
    {
        return $this->hasMany(QuizAnswer::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_quizzes');
    }

    // Tambahkan metode ini
    public function subjectQuiz()
    {
        return $this->hasMany(SubjectQuiz::class);
    }
}
