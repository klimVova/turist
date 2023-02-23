<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanatoriumCard extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'sanatorium_cards';
    protected $guarded = false;

    public function images(){
        return $this->hasMany(SanatoriumCardImage::class);
    }
    public function tags(){
        return $this->belongsToMany(SanatoriumCardTag::class, 'sanatorium_card_tag_cards','sanatorium_card_id','sanatorium_cardTag_id');
    }
    public function types(){
        return $this->belongsTo(Type::class,'type_id','id');
    }
    public function districts(){
        return $this->belongsTo(District::class,'district_id','id');
    }
    public function republics(){
        return $this->belongsTo(Republic::class,'republic_id','id');
    }
    public function cities(){
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function getImageUrlAttribute(){
        return url('storage/' . $this->preview_image);
    }
    public function getLogoUrlAttribute(){
        return url('storage/' . $this->logo);
    }
}
