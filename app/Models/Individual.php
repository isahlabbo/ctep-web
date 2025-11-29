<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Individual extends BaseModel
{
    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
