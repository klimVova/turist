<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SportPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sport_posts';
    protected $guarded = false;


    public function images(){
        return $this->hasMany(SportImage::class);
    }
    public function tags(){
        return $this->belongsToMany(SportTag::class, 'sport_post_tags','sport_post_id','sport_tag_id');
    }
    public function category(){
        return $this->belongsTo(SportCategory::class, 'sport_category_id','id');
    }
    public function getPostImageUrlAttribute(){
        return url('storage/' . $this->sport_preview_image);
    }
}
