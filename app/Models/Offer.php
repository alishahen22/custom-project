<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'value',
        'start_at',
        'end_at',
        'days',
        'status',
        'estate_id',
        'user_id'
    ];

    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
