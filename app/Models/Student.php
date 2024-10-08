<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'address', 'phone', 'cabang',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'student_packages')->withPivot('status');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function scheduleDetails()
    {
        return $this->hasMany(ScheduleDetail::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
