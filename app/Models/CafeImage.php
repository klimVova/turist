<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeImage extends Model
{
    use HasFactory;
    protected $table = 'cafe_images';
    protected $guarded = false;

    public function posts(){
        return $this->belongsTo(CafePost::class);
    }
}
