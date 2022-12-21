<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostelPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hostel_posts';
    protected $guarded = false;


    public function images(){
        return $this->hasMany(HostelImage::class);
    }
    public function tags(){
        return $this->belongsToMany(HostelTag::class, 'hostel_post_tags','hostel_post_id','hostel_tag_id');
    }
    public function category(){
        return $this->belongsTo(HostelCategory::class, 'hostel_category_id','id');
    }
}
