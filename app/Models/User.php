<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'profile_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profile() {
        return $this->belongsTo(Profile::class);
    }

    function agent() {
        switch ($this->profile_id) {
            case '1':
                $agent = $this->profile->centre;
                break;
            case '2':
                $agent = $this->profile->school;
                break;
            case '3':
                $agent = $this->profile->organization;
                break;
            case '4':
                $agent = $this->profile->cafe;
                break;
            
            default:
                $agent = $agent = $this->profile->individual;
                break;
        }
        return $agent;
    }
}
