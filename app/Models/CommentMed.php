<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentMed extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'comment_meds';
    protected $guarded = false;

}
