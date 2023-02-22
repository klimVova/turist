<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanatoriumTag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sanatorium_tags';
    protected $guarded = false;
}
