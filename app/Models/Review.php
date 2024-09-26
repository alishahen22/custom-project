<?php

namespace App\Models;

use App\Models\User;
use App\Models\Estate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'estate_id',
        'comment',
        'rate',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        \Carbon\Carbon::setLocale(app()->getLocale());
        return \Carbon\Carbon::parse($value)->translatedFormat('j F Y');
    }
}
