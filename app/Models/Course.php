<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
        use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'duration'
    ];
    public function enrollments() {
         return $this->hasMany(Enrollment::class); 
    }
    public function comments() { 
        return $this->hasMany(Comment::class); 
    }
}
