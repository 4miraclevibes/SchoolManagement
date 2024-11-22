<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'subject_id', 'user_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function scoreDetails()
    {
        return $this->hasMany(ScoreDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
