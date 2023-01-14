<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cities';
    protected $guarded = false;


    public function cafeCards()
    {
        return $this->hasMany(CafeCard::class, 'city_id');
    }
    public function medicalCards()
    {
        return $this->hasMany(MedicalCard::class, 'city_id');
    }
    public function spaCards()
    {
        return $this->hasMany(SpaCard::class, 'city_id');
    }
}
