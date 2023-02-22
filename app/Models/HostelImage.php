<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostelImage extends Model
{
    use HasFactory;

    protected $table = 'hostel_images';
    protected $guarded = false;

    public function posts(){
        return $this->belongsTo(HostelPost::class);
    }
    public function getPhotoPostUrlAttribute(){
        return url('storage/hostel_post_images/' . $this->images);
    }
}
