<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanatoriumCardImage extends Model
{
    use HasFactory;
    protected $table = 'sanatorium_card_images';
    protected $guarded = false;

    public function cards(){
        return $this->belongsTo(SanatoriumPost::class);
    }
}
