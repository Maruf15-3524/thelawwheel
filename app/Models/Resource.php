<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{  
    use HasFactory;
    protected $fillable = [
        'category', 'title', 'description', 'url_or_img', 'link', 'resource_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'resource_category_id');
    }
}
