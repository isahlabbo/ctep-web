<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends BaseModel
{
    public function exams(){
        return $this->hasMany(Exam::class);
    }
}
