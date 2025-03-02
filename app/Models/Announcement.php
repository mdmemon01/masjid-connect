<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'masjid_id',
        'title',
        'content',
        'image_path', // Add this line
        'is_published',
        'publish_date',
        'expiry_date',
        'category'
    ];
    
    protected $casts = [
        'publish_date' => 'date',
        'expiry_date' => 'date',
        'is_published' => 'boolean',
    ];
    
    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }
    
    // Get active announcements only
    public function scopeActive($query)
    {
        return $query->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('expiry_date')
                  ->orWhere('expiry_date', '>=', now()->toDateString());
            });
    }
}