<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCardImage extends Model
{
    protected $table = 'medical_card_images';
    protected $guarded = false;


    public function getPhotoUrlAttribute(){
        return url('storage/medical_card_images/' . $this->images);
    }
}
