<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Build extends BaseModel
{
    protected $guarded = [];
    protected $casts = [
        'artifacts' => 'array',
    ];

    public function exam() {
        return $this->belongsTo(Exam::class);
    }
}
