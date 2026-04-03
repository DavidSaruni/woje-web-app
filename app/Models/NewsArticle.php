<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

class NewsArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'main_image',
        'category_id',
        'status',
        'featured',
        'published_at',
        'date',
        'author',
        'tags',
        'read_time',
        'views',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'date' => 'datetime',
        'featured' => 'boolean',
        'tags' => 'array',
        'read_time' => 'integer',
        'views' => 'integer',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title') && empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    /**
     * Get the category that owns the news article.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }

    /**
     * Get the images for the news article.
     */
    public function images(): HasMany
    {
        return $this->hasMany(NewsImage::class, 'news_article_id')->orderBy('sort_order');
    }

    /**
     * Get the main image for the news article.
     */
    public function mainImage(): HasMany
    {
        return $this->hasMany(NewsImage::class, 'news_article_id')->where('is_main', true);
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Scope a query to only include published articles.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include draft articles.
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Scope a query to only include featured articles.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeByCategory($query, $categorySlug)
    {
        return $query->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }

    /**
     * Check if the article is published.
     */
    public function isPublished(): bool
    {
        return $this->status === 'published' && $this->published_at && $this->published_at->isPast();
    }

    /**
     * Get the formatted published date.
     */
    public function getFormattedPublishedAtAttribute(): string
    {
        return $this->published_at ? $this->published_at->format('F d, Y') : '';
    }

    /**
     * Get the reading time in minutes.
     */
    public function getReadingTimeAttribute(): int
    {
        return $this->read_time ?: max(1, ceil(str_word_count(strip_tags($this->content)) / 200));
    }

    /**
     * Increment the view count.
     */
    public function incrementViews(): int
    {
        $this->increment('views');
        return $this->views;
    }

    /**
     * Web-relative path for use with asset(), matching Poster::$image_path.
     * Built from main_image: new uploads use images/news/... under public/;
     * legacy rows may use news/... (served via /storage/...).
     */
    public function getImagePathAttribute(): ?string
    {
        return self::storedPathForAsset($this->main_image);
    }

    /**
     * Same as image_path for any stored path string (e.g. additional gallery paths).
     */
    public static function storedPathForAsset(?string $stored): ?string
    {
        if ($stored === null || trim($stored) === '') {
            return null;
        }

        $stored = trim($stored);

        if (str_starts_with($stored, 'http://') || str_starts_with($stored, 'https://')) {
            return $stored;
        }

        $stored = ltrim($stored, '/');

        if (str_starts_with($stored, 'images/')) {
            return $stored;
        }

        if (str_starts_with($stored, 'storage/')) {
            return $stored;
        }

        return 'storage/' . $stored;
    }

    /**
     * Full URL (same pattern as Poster::getImageUrlAttribute).
     */
    public function getImageUrlAttribute(): ?string
    {
        $path = $this->image_path;

        return $path ? asset($path) : null;
    }
}
