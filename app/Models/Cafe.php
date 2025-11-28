<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cafe extends BaseModel
{
    public function profile() : Returntype {
        return $this->belongsTo(Profile::class);
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }
}
