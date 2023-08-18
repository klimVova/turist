<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultingPost extends Model
{
    use HasFactory;

    protected $table = 'consulting_posts';
    protected $guarded = false;

    public function getImageUrlAttribute(){
        return url('storage/' . $this->preview_image);
    }
}
