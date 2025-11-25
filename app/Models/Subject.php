<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends BaseModel
{
    public function examTypeSubjects() {
        return $this->hasMany(ExamTypeSubject::class);
    }
}
