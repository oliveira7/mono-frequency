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
}
