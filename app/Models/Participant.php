<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'birthday'
    ];

    protected $casts = [
        'birthday' => 'date'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function frequencies()
    {
        return $this->hasMany(Frequency::class);
    }

    public function enrollments()
    {
        return $this->belongsToMany(Enrollment::class);
    }
}
