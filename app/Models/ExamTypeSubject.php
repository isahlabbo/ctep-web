<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamTypeSubject extends BaseModel
{
    public function examType() {
        return $this->belongsTo(ExamType::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
