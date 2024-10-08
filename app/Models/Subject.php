<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'package_id',
    ];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function subjectQuiz()
    {
        return $this->hasMany(SubjectQuiz::class);
    }
    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'subject_quizzes');
    }
}