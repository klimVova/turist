<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanatoriumAction extends Model
{
    use HasFactory;

    protected $table = 'sanatorium_actions';
    protected $guarded = false;
}
