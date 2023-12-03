<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

        static::deleting(function ($band) {
            // Delete band photo when music band is deleted
            Storage::delete($band->photo);

            $band->albums->each(function($album){
                Storage::delete($album->photo);
            });


        });
    }
}
