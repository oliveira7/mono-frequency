<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'activity_id',
        'registered_at',
        'status',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class);
    }
}
