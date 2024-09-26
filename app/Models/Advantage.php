<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advantage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        'desc_en',
        'icon',
    ];
    protected $appends = ['icon_path'];

    //translatable name
    public function getNameAttribute()
    {
        return $this['name_' . app()->getLocale()];
    }

    //translatable desc
    public function getDescAttribute()
    {
        return $this['desc_' . app()->getLocale()];
    }




    public function getIconPathAttribute()
    {
        return asset('storage/' . $this->icon);
    }


}
