<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeCardTag extends Model
{
    use HasFactory;
    protected $table = 'cafe_card_tags';
    protected $guarded = false;

    public function cafeTags(){
        return $this->belongsToMany(CafeTag::class, 'cafe_card_tags','cafe_card_id','cafe_tag_id');
    }
}
