<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAction extends Model
{
    use HasFactory;

    protected $table = 'medical_actions';
    protected $guarded = false;
}
