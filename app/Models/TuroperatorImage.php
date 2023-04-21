<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuroperatorImage extends Model
{
    use HasFactory;


    protected $table = 'turoperator_images';
    protected $guarded = false;

    public function posts(){
        return $this->belongsTo(TuroperatorPost::class);
    }
    public function getPhotoPostUrlAttribute(){
        return url('storage/turoperator_post_images/' . $this->images);
    }
}
