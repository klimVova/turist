<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanatoriumCardTag extends Model
{
    use HasFactory;

    use HasFactory;
    use SoftDeletes;

    protected $guarded = false;
    protected $table = 'sanatorium_card_tags';
}
