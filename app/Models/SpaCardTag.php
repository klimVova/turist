<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaCardTag extends Model
{
    use HasFactory;
    protected $table = 'spa_card_tags';
    protected $guarded = false;

    public function spaTags(){
        return $this->belongsToMany(SpaTag::class, 'spa_card_tags','spa_card_id','spa_tag_id');
    }
}
