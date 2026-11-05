<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceDetail extends Model
{
    protected $fillable = [
        'attendance_session_id', 'student_id', 'status', 'keterangan', 'edited_at',
    ];

    protected function casts(): array
    {
        return ['edited_at' => 'datetime'];
    }

    public function session()
    {
        return $this->belongsTo(AttendanceSession::class, 'attendance_session_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function parentNotification()
    {
        return $this->hasOne(ParentNotification::class);
    }
}
