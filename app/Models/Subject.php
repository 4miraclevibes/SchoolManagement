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
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
    public function students()
    {
        return $this->hasManyThrough(
            Student::class,
            StudentPackage::class,
            'package_id', // Foreign key di student_packages
            'id', // Foreign key di students
            'package_id', // Local key di subjects
            'student_id' // Local key di student_packages
        );
    }
}
