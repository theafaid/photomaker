<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = \Str::slug($category->name);
        });
    }
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function scopeParents($q)
    {
        return $q->where('parent_id', null);
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
