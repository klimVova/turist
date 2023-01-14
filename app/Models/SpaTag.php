<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpaTag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'spa_tags';
    protected $guarded = false;
}
