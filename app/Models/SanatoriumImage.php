<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanatoriumImage extends Model
{
    use HasFactory;

    protected $table = 'sanatorium_images';
    protected $guarded = false;

    public function posts(){
        return $this->belongsTo(SanatoriumPost::class);
    }
    public function getPhotoPostUrlAttribute(){
        return url('storage/sanatorium_post_images/' . $this->images);
    }
}
