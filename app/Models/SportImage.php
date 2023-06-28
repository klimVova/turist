<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportImage extends Model
{
    use HasFactory;

    protected $table = 'sport_images';
    protected $guarded = false;

    public function posts(){
        return $this->belongsTo(SanatoriumPost::class);
    }
    public function getPhotoPostUrlAttribute(){
        return url('storage/sport_post_images/' . $this->images);
    }
}
