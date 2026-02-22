<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected  $guarded = ['id'];


    protected $casts = [
        'publication_date' => 'date',
        'download_count' => 'integer',
        'featured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Scope for active publications
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope by category
    public function scopeByCategory($query, $category)
    {
        if ($category && $category !== 'all') {
            return $query->where('category', $category);
        }
        return $query;
    }

    // Scope for featured
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    // Get category label
    public function getCategoryLabelAttribute()
    {
        return match($this->category) {
            'tract' => 'Tract',
            'audio' => 'Audio',
            'devotional' => 'Devotional',
            default => ucfirst($this->category)
        };
    }

    // Get file URL
    public function getFileUrlAttribute()
    {
        if ($this->file_path) {
            return asset('storage/' . $this->file_path);
        }
        return null;
    }

    // Get thumbnail URL
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail_path) {
            return asset('storage/' . $this->thumbnail_path);
        }
        return asset('images/default-thumbnail.jpg');
    }

    // Format publication date
    public function getFormattedDateAttribute()
    {
        return $this->publication_date ? $this->publication_date->format('M d, Y') : 'N/A';
    }
}
