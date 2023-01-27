<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'districts';
    protected $guarded = false;

    public function cafeCards()
    {
        return $this->hasMany(CafeCard::class, 'district_id');
    }
    public function medicalCards()
    {
        return $this->hasMany(MedicalCard::class, 'district_id');
    }
    public function spaCards()
    {
        return $this->hasMany(SpaCard::class, 'district_id');
    }
    public function hostelCards()
    {
        return $this->hasMany(HostelCard::class, 'district_id');
    }
}
