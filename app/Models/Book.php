<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\sluggable;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'book_code', 'tittle', 'cover', 'status', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tittle'
            ]
        ];
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_categoriy', 'book_id', 'categoriy_id');
    }
}
