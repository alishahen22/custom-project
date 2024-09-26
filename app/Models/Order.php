<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'estate_id',
        'price',
        'payment_method',
        'payment_status',
        'order_number',
        'merchant_id',
        'owner_id',
        'start_at',
        'end_at',
        'total_price',
        'has_offer',
        'offer_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id', 'id');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }






}
