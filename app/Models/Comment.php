<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'idea_id',
        'created_by',
        'content',
        'created_at',
        'updated_at'
    ];


    /**
     * Get the phone associated with the user.
     */
    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
