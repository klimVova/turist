<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'types';
    protected $guarded = false;

    public function cafeCards()
    {
        return $this->hasMany(CafeCard::class, 'type_id');
    }
    public function medicalCards()
    {
        return $this->hasMany(MedicalCard::class, 'type_id');
    }
    public function spaCards()
    {
        return $this->hasMany(SpaCard::class, 'type_id');
    }
    public function HostalCards()
    {
        return $this->hasMany(HostelCard::class, 'type_id');
    }
}
