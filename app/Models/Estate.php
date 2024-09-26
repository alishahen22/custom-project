<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area',
        'rooms',
        'baths',
        'type',
        'finishing',
        'desc',
        'category_id',
        'city_id',
        'address',
        'landmarks',
        'feature_ids',
        'arrival_time',
        'departure_time',
        'insurance_amount',
        'price',
        'cancellation_policy',
        'booking_conditions',
        'tourism_ministry',
        'user_id',
        'status',
        'step',
    ];


    protected $casts = [
        'feature_ids' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'estate_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'estate_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'estate_id', 'id');
    }





}
