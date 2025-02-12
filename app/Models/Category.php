<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tuitionPosts() {
        return $this->hasMany(TuitionPost::class);
    }
}
