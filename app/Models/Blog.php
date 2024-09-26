<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_ar',
        'title_en',
        'slug',
        'desc_ar',
        'desc_en',
        'image',
    ];
    protected $appends = ['image_path'];

    public function getTitleAttribute()
    {
        return $this['title_' . app()->getLocale()];
    }

    public function getDescAttribute()
    {
        return $this['desc_' . app()->getLocale()];
    }


    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
    }

    
    public function getCreatedAtAttribute($value)
    {
        \Carbon\Carbon::setLocale(app()->getLocale());
        return \Carbon\Carbon::parse($value)->translatedFormat('j F Y');
    }

}
