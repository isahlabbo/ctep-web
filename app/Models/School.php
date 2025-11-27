<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends BaseModel
{
    public function profile() {
        return $this->belongsTo(Profile::class);
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }
}
