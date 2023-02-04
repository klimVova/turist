<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentMed extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'comment_meds';
    protected $guarded = false;


}
