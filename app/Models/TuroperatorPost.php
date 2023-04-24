<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TuroperatorPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'turoperator_posts';
    protected $guarded = false;


    public function images(){
        return $this->hasMany(TuroperatorImage::class);
    }
    public function tags(){
        return $this->belongsToMany(TuroperatorTag::class, 'turoperator_post_tags','turoperator_post_id','turoperator_tag_id');
    }
    public function category(){
        return $this->belongsTo(TuroperatorCategory::class, 'turoperator_category_id','id');
    }

    public function turoperatorTodoLists()
    {
        return $this->hasMany(TuroperatorTodoList::class, 'post_id');
    }

    public function getPostImageUrlAttribute(){
        return url('storage/' . $this->turoperator_preview_image);
    }
}
