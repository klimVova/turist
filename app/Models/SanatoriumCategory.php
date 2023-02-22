<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanatoriumCategory extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'sanatorium_categories';
    protected $guarded = false;
}
