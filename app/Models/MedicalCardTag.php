<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCardTag extends Model
{
    use HasFactory;
    protected $table = 'medical_card_tags';
    protected $guarded = false;

    public function medicalTags(){
        return $this->belongsToMany(MedicalTag::class, 'medical_card_tags','medical_card_id','medical_tag_id');
    }
}
