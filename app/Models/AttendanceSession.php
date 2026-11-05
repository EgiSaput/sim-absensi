<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceSession extends Model
{
    protected $fillable = [
        'teaching_schedule_id', 'date', 'status', 'notes', 'created_by', 'confirmed_at',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'confirmed_at' => 'datetime',
        ];
    }

    public function teachingSchedule()
    {
        return $this->belongsTo(TeachingSchedule::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function details()
    {
        return $this->hasMany(AttendanceDetail::class);
    }

    // Rekap cepat: jumlah siswa per status pada sesi ini.
    public function recap(): array
    {
        return [
            'HADIR' => $this->details()->where('status', 'HADIR')->count(),
            'IZIN' => $this->details()->where('status', 'IZIN')->count(),
            'SAKIT' => $this->details()->where('status', 'SAKIT')->count(),
            'ALFA' => $this->details()->where('status', 'ALFA')->count(),
        ];
    }
}
