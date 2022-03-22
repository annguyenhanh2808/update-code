<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = [
        'title',
        'category_id',
        'location',
        'skills',
        'user_id',
        'image_url',
        'salary',
        'description',
        'expired_date',
        'job_type',
        'status',
        'active'
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
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
