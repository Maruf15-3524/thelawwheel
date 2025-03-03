<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'degree', 'designation', 'role', 'order', 'description', 'profile_pic'];
}
