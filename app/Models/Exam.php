<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends BaseModel
{
    public function examSessions() {
        return $this->hasMany(ExamSession::class);
    }

    public function examType() {
        return $this->belongsTo(ExamType::class);
    }
}
