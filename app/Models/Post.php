<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title', 'content', 'slug', 'status', 'id_category'
    ];

    public function category()
    {
        return $this->hasOne(category::class, 'id', 'id_category');
    }
}
