<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function photosTypes()
    {
        return $this->hasMany(PhotoType::class);
    }
}
