<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayerTime extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'masjid_id',
        'date',
        'fajr',
        'dhuhr',
        'asr',
        'maghrib',
        'isha',
        'jummah',
    ];
    
    protected $casts = [
        'date' => 'date',
    ];
    
    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }
}