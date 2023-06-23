<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaCardImage extends Model
{
    protected $table = 'spa_card_images';
    protected $guarded = false;


    public function getPhotoUrlAttribute(){
        return url('storage/spa_card_images/' . $this->images);
    }
}
