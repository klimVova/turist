<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostelCardTag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = false;
    protected $table = 'hostel_card_tags';

    public function hostelTags(){
        return $this->belongsToMany(hostelTag::class, 'hostel_card_tags','hostel_card_id','hostel_tag_id');
    }
}
