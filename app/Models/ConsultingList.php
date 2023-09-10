<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultingList extends Model
{
    use HasFactory;

    protected $table = 'consulting_lists';
    protected $guarded = false;
}
