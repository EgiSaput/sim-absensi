<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachingSchedule extends Model
{
    protected $fillable = [
        'teacher_id', 'class_id', 'subject_id', 'academic_year_id',
        'day', 'start_time', 'end_time',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function attendanceSessions()
    {
        return $this->hasMany(AttendanceSession::class);
    }
}
