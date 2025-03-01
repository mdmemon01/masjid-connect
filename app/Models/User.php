<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isImam()
    {
        return $this->role === 'imam';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    public function masjids()
    {
        return $this->belongsToMany(Masjid::class, 'imam_masjid');
    }
}