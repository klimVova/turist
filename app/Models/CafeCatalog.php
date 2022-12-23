<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeCatalog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cafe_catalogs';
    protected $guarded = false;

    public function cafeCategories()
    {
        return $this->hasMany(CafeCategory::class, 'catalog_id');
    }
}
