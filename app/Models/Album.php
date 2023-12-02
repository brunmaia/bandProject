<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    // Define the relationship with music band
    public function musicBand()
    {
        return $this->belongsTo(MusicBand::class);
    }

    // Handle deletion of associated images
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($album) {
            // Delete album image when album is deleted
            if ($album->album_image_path) {
                // Use PHP's unlink to delete the file
                unlink(public_path($album->album_image_path));
            }
        });
    }
}
