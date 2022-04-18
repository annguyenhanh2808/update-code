<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    protected $table = 'ideas';

    protected $fillable = [
        'title',
        'content',
        'created_by',
        'updated_by',
        'category_id',
        'tags',
        'is_anonymously',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * Get the phone associated with the user.
     */
    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }


}
