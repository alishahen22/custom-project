<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'logo',
    ];

    protected $appends = ['logo_path'];

     //translatable name
     public function getNameAttribute()
     {
         return $this['name_' . app()->getLocale()];
     }



    public function getIogoPathAttribute()
    {
        return asset('storage/' . $this->logo);
    }

}
