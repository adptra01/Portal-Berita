<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'slug',
        'keyword',
        'content',
        'category_id',
        'status',
        'user_id',
        'viewer',
    ];

    public function scopeFilterBySearch($query, $search)
    {
        if ($search) {
            return $query->where('status', 1)->where('title', 'like', '%' . $search . '%');
        }
    }

    public function scopeFilterByCategory($query, $categoryName)
    {
        if ($categoryName) {
            return $query->whereHas('category', function ($query) use ($categoryName) {
                $query->where('status', 1)->where('name', $categoryName);
            });
        }
    }

    public function scopeFilterByDateRange($query, $startDate, $endDate)
    {
        if ($startDate) {
            $query->where('status', 1)->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->where('status', 1)->whereDate('created_at', '<=', $endDate);
        }
        return $query;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    /**
     * Get the category that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
