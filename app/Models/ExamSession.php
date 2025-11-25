<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamSession extends BaseModel
{
    public function students() {
        return $this->hasMany(Student::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function duration() {

        $examWillStartAt = strtotime($this->start);
        $examWillEndAt = strtotime($this->end);

        $durationInSeconds = $examWillEndAt - $examWillStartAt;

        $secondsInMinute = 60;

        return $durationInSeconds/$secondsInMinute;
    }
}
