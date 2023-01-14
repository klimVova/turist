<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalTag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'medical_tags';
    protected $guarded = false;
}
