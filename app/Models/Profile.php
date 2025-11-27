<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends BaseModel
{
    public function centres() {
        return $this->hasMany(Centre::class);
    }

    public function schools() {
        return $this->hasMany(School::class);
    }

    public function organizations() {
        return $this->hasMany(Organization::class);
    }
    
}
