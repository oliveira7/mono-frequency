<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Frequency extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'participation_id',
        'teacher_id',
        'schedule_id',
        'present',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
