<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicBand extends Model
{
    use HasFactory;
    protected $table = 'music_bands';
    // Define the relationship with albums
    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    // Handle deletion of associated images
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($musicBand) {
            // Delete band photo when music band is deleted
            if ($musicBand->band_photo_path) {
                // Use PHP's unlink to delete the file
                unlink(public_path($musicBand->band_photo_path));
            }
        });
    }
}
