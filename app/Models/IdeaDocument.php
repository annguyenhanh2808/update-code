<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeaDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'idea_id',
        'file_name',
    ];
}
