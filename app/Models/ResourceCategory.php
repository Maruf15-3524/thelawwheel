<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResourceCategory extends Model
{
    use HasFactory;

    // Define the columns that are mass assignable
    protected $fillable = [
        'name',
    ];

    public function resources()
    {
        return $this->hasMany(Resource::class, 'resource_category_id');
    }
}
