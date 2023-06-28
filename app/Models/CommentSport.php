<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentSport extends Model
{
    use Filterable;
    use SoftDeletes;

    protected $table = 'comment_sports';
    protected $guarded = false;
}
