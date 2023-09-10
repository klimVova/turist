<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultingAction extends Model
{
    use HasFactory;
    protected $table = 'consulting_actions';
    protected $guarded = false;
}
