<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafePost extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'cafe_posts';
    protected $guarded = false;


    public function images(){
        return $this->hasMany(CafeImage::class);
    }
    public function tags(){
        return $this->belongsToMany(CafeTag::class, 'cafe_post_tags','cafe_post_id','cafe_tag_id');
    }
    public function category(){
        return $this->belongsTo(CafeCategory::class, 'cafe_category_id','id');
    }
    public function catalog(){
        return $this->belongsTo(CafeCatalog::class, 'cafe_catalog_id','id');
    }
}
