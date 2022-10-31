<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'location_id',
        'name',
        'description',
        'class_size',
        'banner',
        'start_at',
        'end_at',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
