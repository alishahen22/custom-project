<?php

namespace App\Models;

use App\Models\Estate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'estate_id',
    ];

    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id', 'id');
    }

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->path);
    }


}
