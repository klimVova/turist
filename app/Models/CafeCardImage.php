<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeCardImage extends Model
{
    protected $table = 'cafe_card_images';
    protected $guarded = false;


    public function getPhotoUrlAttribute(){
        return url('storage/cafe_card_images/' . $this->images);
    }
}
