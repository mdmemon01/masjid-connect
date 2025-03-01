<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrayerTime;

class Masjid extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description'
    ];

    /**
     * Get the imams associated with this masjid
     */
    public function imams()
    {
        return $this->belongsToMany(User::class, 'imam_masjid')->where('role', 'imam');
    }

    //Get the prayer times for the masjid.

   public function prayerTimes()
   {
       return $this->hasMany(PrayerTime::class);
   }
}