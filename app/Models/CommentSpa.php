<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentSpa extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'comment_spas';
    protected $guarded = false;
}
