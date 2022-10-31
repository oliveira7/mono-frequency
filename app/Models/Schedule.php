<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'time',
        'day_of_the_week'
    ];

    public function frequencies()
    {
        return $this->hasMany(Frequency::class);
    }

    public function activity()
    {
        return $this->hasOne(Activity::class);
    }

}
