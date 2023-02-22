<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanatoriumPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sanatorium_posts';
    protected $guarded = false;


    public function images(){
        return $this->hasMany(SanatoriumImage::class);
    }
    public function tags(){
        return $this->belongsToMany(SanatoriumTag::class, 'sanatorium_post_tags','sanatorium_post_id','sanatorium_tag_id');
    }
    public function category(){
        return $this->belongsTo(SanatoriumCategory::class, 'sanatorium_category_id','id');
    }
}
