<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCard extends Model
{
    use HasFactory;
    protected $table = 'medical_cards';
    protected $guarded = false;
}
