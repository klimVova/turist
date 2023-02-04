<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostelCardImage extends Model
{
    protected $table = 'hostel_card_images';
    protected $guarded = false;

    public function cards(){
        return $this->belongsTo(HostelPost::class);
    }
}
