<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Republic extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'republics';
    protected $guarded = false;

    public function cafeCards()
    {
        return $this->hasMany(CafeCard::class, 'republic_id');
    }
    public function medicalCards()
    {
        return $this->hasMany(MedicalCard::class, 'republic_id');
    }
    public function spaCards()
    {
        return $this->hasMany(SpaCard::class, 'republic_id');
    }
    public function hostelCards()
    {
        return $this->hasMany(HostelCard::class, 'republic_id');
    }
    public function turoperatorCards()
    {
        return $this->hasMany(TuroperatorCard::class, 'republic_id');
    }
}
