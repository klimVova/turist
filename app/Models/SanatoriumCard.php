<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanatoriumCard extends Model
{
    use HasFactory;

    protected $table = 'sanatorium_cards';
    protected $guarded = false;

    public function images(){
        return $this->hasMany(SanatoriumCardImage::class);
    }

    public function tags(){
        return $this->belongsToMany(SanatoriumCardTag::class, 'sanatorium_card_tag_cards','sanatorium_card_id','sanatorium_cardTag_id');
    }
}
