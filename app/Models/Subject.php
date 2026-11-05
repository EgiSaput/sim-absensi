<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['code', 'name'];

    public function teachingSchedules()
    {
        return $this->hasMany(TeachingSchedule::class);
    }
}
