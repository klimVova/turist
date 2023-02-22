<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanatoriumServic extends Model
{
    use HasFactory;

    protected $table = 'sanatorium_servics';
    protected $guarded = false;
}
