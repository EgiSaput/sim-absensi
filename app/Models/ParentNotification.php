<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentNotification extends Model
{
    protected $fillable = ['attendance_detail_id', 'sent', 'sent_at', 'message'];

    protected function casts(): array
    {
        return [
            'sent' => 'boolean',
            'sent_at' => 'datetime',
        ];
    }

    public function attendanceDetail()
    {
        return $this->belongsTo(AttendanceDetail::class);
    }
}
