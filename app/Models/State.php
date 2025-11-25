<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends BaseModel
{
    public function lgas() {
        return $this->hasMany(Lga::class);;
    }
}
