<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuroperatorCardImage extends Model
{
    use HasFactory;
    protected $table = 'turoperator_card_images';
    protected $guarded = false;

    public function cards(){
        return $this->belongsTo(TuroperatorPost::class);
    }
    public function getPhotoUrlAttribute(){
        return url('storage/turoperator_card_images/' . $this->images);
    }
}
