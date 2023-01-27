<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostelCard extends Model
{
    use HasFactory;


    protected $table = 'hostel_cards';
    protected $guarded = false;

    public function images(){
        return $this->hasMany(HostelCardImage::class);
    }

    public function tags(){
        return $this->belongsToMany(HostelCardTag::class, 'hostel_card_tag_cards','hostel_card_id','hostel_cardTag_id');
    }
}
