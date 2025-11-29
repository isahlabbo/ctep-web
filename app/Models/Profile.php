<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends BaseModel
{
    public function centre() {
        return $this->hasOne(Centre::class);
    }

    public function school() {
        return $this->hasOne(School::class);
    }

    public function organization() {
        return $this->hasOne(Organization::class);
    }

    public function cafe() {
        return $this->hasOne(Cafe::class);
    }
    
    public function individual() {
        return $this->hasOne(Individual::class);
    }
    
    function path() {
        switch ($this->id) {
            case '1':
                $path = 'centre';
                break;
            case '2':
                $path = 'school';
                break;
            case '3':
                $path = 'organization';
                break;
            case '4':
                $path = 'cafe';
                break;
            
            default:
                $path = 'individual';
                break;
        }
        return $path;
    }
    
}
