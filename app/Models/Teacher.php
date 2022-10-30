<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'type',
        'is_admin'
    ];

    protected $casts = [
        'is_admin' => 'boolean'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
