<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'category_name'
    ];

    /**
     * Get the phone associated with the user.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'category_id', 'id');
    }
}
