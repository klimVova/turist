<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportCardImage extends Model
{
    use HasFactory;
    protected $table = 'sport_card_images';
    protected $guarded = false;

    public function cards(){
        return $this->belongsTo(SanatoriumPost::class);
    }
    public function getPhotoUrlAttribute(){
        return url('storage/sport_card_images/' . $this->images);
    }
}
