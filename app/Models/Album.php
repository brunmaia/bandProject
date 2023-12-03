<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    // Define the relationship with music band
    public function band() {
        return $this->belongsTo(MusicBand::class);
    }

    // Handle deletion of associated images
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($album) {
            // Delete album image when album is deleted
            Storage::delete($album->photo);
        });
    }
}
