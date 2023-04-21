<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentTur extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'comment_turs';
    protected $guarded = false;
}
