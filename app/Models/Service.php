<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'image', 'icon', 'sort_order', 'status'
    ];

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'service_features');
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'parent');
    }

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'parent');
    }

    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(fn($service) => $service->slug = Str::slug($service->title));
        static::updating(fn($service) => $service->slug = Str::slug($service->title));
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }
}