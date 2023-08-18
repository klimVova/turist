<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultingService extends Model
{
    use HasFactory;

    protected $table = 'consulting_services';
    protected $guarded = false;
}
