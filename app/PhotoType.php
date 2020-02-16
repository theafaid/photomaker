<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoType extends Model
{
    protected $guarded = [];
    protected $table = "contact_photo_types";
    public $timestamps = false;
    public static $allowedTypes = [
        'خلفية مفرغة',
        'خلفية مركبة',
        'تصوير بالشكل الطبيعى',
        'الممثلين(تصوير الاشخاص)',
    ];
}
