<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeaDetail extends Model
{
    use HasFactory;
    protected $table = 'ideas_detail';

    protected $fillable = [
        'idea_id',
        'user_id',
        'like_or_dislike',
        'created_at',
        'updated_at'
    ];

}
