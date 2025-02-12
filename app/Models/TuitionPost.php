<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TuitionPost extends Model
{

    use HasFactory;

    protected $fillable = [
        'subject_id',
        'fee',
        'max_students',
        'category_id',
        'user_id',
        'photo_path',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
